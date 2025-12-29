#!/bin/bash
set -e

echo "🚀 Iniciando Sistema ParkCore..."

# Crear directorios de logs si no existen
mkdir -p /var/log/nginx /var/log/php /var/log/supervisor

# Establecer permisos correctos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Crear enlace simbólico de storage si no existe
if [ ! -L /var/www/html/public/storage ]; then
    php artisan storage:link
fi

# Generar key si no existe
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Cache de configuración (solo en producción)
if [ "$APP_ENV" = "production" ]; then
    echo "⚡ Optimizando para producción..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

# Ejecutar migraciones
echo "📦 Ejecutando migraciones..."
php artisan migrate --force

# Ejecutar seeders solo si la base de datos está vacía (opcional)
# php artisan db:seed --force

echo "✅ Sistema ParkCore listo!"

# Ejecutar el comando pasado como argumento
exec "$@"
