# ============================================
# Dockerfile para Sistema ParkCore - Laravel 12
# ============================================

FROM php:8.2-fpm

# Argumentos de build
ARG NODE_VERSION=20
ARG POSTGRES_VERSION=15

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Variables de entorno
ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Configurar e instalar extensión GD con todas las dependencias
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp \
    --with-xpm

# Instalar extensiones PHP requeridas por Laravel
RUN docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    opcache

# Verificar que GD está instalado
RUN php -m | grep -i gd

# Instalar Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos de configuración de Nginx
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/default.conf /etc/nginx/sites-available/default

# Copiar configuración de Supervisor
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copiar configuración de PHP
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Copiar archivos del proyecto
COPY --chown=www-data:www-data . .

# Instalar dependencias de Composer
# Usar update para resolver incompatibilidades del lock file
RUN composer update --optimize-autoloader --no-dev --no-interaction

# Instalar dependencias de Node y compilar assets
RUN npm install && npm run build

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Copiar script de entrada
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Exponer puerto
EXPOSE 80

# Punto de entrada
ENTRYPOINT ["entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
