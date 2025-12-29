# 🚗 Sistema ParkCore - Manual Técnico

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<p align="center">
  <strong>Sistema de Gestión de Estacionamiento</strong><br>
  Desarrollado con Laravel 12 + AdminLTE
</p>

---

## 📋 Tabla de Contenidos

1. [Descripción General](#-descripción-general)
2. [Requisitos del Sistema](#-requisitos-del-sistema)
3. [Instalación](#-instalación)
4. [Configuración](#-configuración)
5. [Estructura del Proyecto](#-estructura-del-proyecto)
6. [Base de Datos](#-base-de-datos)
7. [Módulos del Sistema](#-módulos-del-sistema)
8. [Rutas de la API](#-rutas-de-la-api)
9. [Autenticación y Autorización](#-autenticación-y-autorización)
10. [Dependencias](#-dependencias)
11. [Comandos Útiles](#-comandos-útiles)

---

## 🎯 Descripción General

**Sistema ParkCore** es una solución integral para la gestión de estacionamientos desarrollada con Laravel 12. El sistema permite administrar espacios de parqueo, clientes, vehículos, tickets de estacionamiento, facturación y generación de reportes.

### Características Principales
- ✅ Gestión de espacios de estacionamiento
- ✅ Registro y seguimiento de clientes
- ✅ Control de vehículos por cliente
- ✅ Sistema de tickets con entrada/salida
- ✅ Tarifas configurables (regular, nocturna, fin de semana, feriados)
- ✅ Facturación electrónica
- ✅ Reportes diarios, semanales y mensuales
- ✅ Sistema de roles y permisos
- ✅ Panel administrativo con AdminLTE

---

## 💻 Requisitos del Sistema

| Componente | Versión Mínima |
|------------|----------------|
| PHP | 8.2 o superior |
| Composer | 2.x |
| Node.js | 18.x o superior |
| NPM | 9.x o superior |
| MySQL/MariaDB | 8.0 / 10.4 |
| XAMPP | 8.2.x (opcional) |

### Extensiones PHP Requeridas
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML

---

## 🚀 Instalación

### Paso 1: Clonar el Repositorio
```bash
git clone <url-del-repositorio> sistema_parkcore
cd sistema_parkcore
```

### Paso 2: Instalar Dependencias PHP
```bash
composer install
```

### Paso 3: Instalar Dependencias JavaScript
```bash
npm install
```

### Paso 4: Configurar Variables de Entorno
```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### Paso 5: Configurar Base de Datos
Editar el archivo `.env` con los datos de conexión:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=parkcore_db
DB_USERNAME=root
DB_PASSWORD=
```

### Paso 6: Ejecutar Migraciones
```bash
php artisan migrate
```

### Paso 7: Ejecutar Seeders (Opcional)
```bash
php artisan db:seed
```

### Paso 8: Compilar Assets
```bash
npm run build
```

### Paso 9: Iniciar Servidor
```bash
php artisan serve
```

> 📍 La aplicación estará disponible en: `http://localhost:8000`

### Instalación Rápida (Script Automatizado)
```bash
composer setup
```

---

## ⚙ Configuración

### Variables de Entorno Principales

| Variable | Descripción | Ejemplo |
|----------|-------------|---------|
| `APP_NAME` | Nombre de la aplicación | `ParkCore` |
| `APP_ENV` | Entorno de ejecución | `local` / `production` |
| `APP_DEBUG` | Modo debug | `true` / `false` |
| `APP_URL` | URL base de la aplicación | `http://localhost` |
| `DB_CONNECTION` | Driver de base de datos | `mysql` |
| `DB_DATABASE` | Nombre de la base de datos | `parkcore_db` |
| `MAIL_MAILER` | Driver de correo | `smtp` |

### Configuración de Correo (SMTP)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-correo@gmail.com
MAIL_PASSWORD=tu-contraseña-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@parkcore.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## 📁 Estructura del Proyecto

```
sistema_parkcore/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AdminController.php      # Dashboard principal
│   │       ├── AjusteController.php     # Configuración del sistema
│   │       ├── ClienteController.php    # Gestión de clientes
│   │       ├── EspacioController.php    # Espacios de parqueo
│   │       ├── FacturacionController.php # Facturación
│   │       ├── ReporteController.php    # Reportes
│   │       ├── RoleController.php       # Roles y permisos
│   │       ├── TarifaController.php     # Tarifas
│   │       ├── TicketController.php     # Tickets de parqueo
│   │       ├── UserController.php       # Usuarios
│   │       └── VehiculoController.php   # Vehículos
│   ├── Mail/                            # Clases de correo
│   ├── Models/                          # Modelos Eloquent
│   │   ├── Ajuste.php
│   │   ├── Cliente.php
│   │   ├── Espacio.php
│   │   ├── Facturacion.php
│   │   ├── Tarifa.php
│   │   ├── Ticket.php
│   │   ├── User.php
│   │   └── Vehiculo.php
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/                      # Migraciones de BD
│   └── seeders/
├── lang/                                # Archivos de idioma
├── public/                              # Archivos públicos
├── resources/
│   └── views/                           # Vistas Blade
├── routes/
│   └── web.php                          # Rutas web
├── storage/
├── tests/
└── vendor/
```

---

## 🗄 Base de Datos

### Diagrama de Entidad-Relación

```
┌─────────────┐     ┌─────────────┐     ┌─────────────┐
│   users     │     │  clientes   │     │  vehiculos  │
├─────────────┤     ├─────────────┤     ├─────────────┤
│ id          │     │ id          │◄────│ cliente_id  │
│ name        │     │ nombres     │     │ placa       │
│ email       │     │ nro_documento│    │ marca       │
│ password    │     │ email       │     │ modelo      │
│ nombres     │     │ celular     │     │ color       │
│ apellidos   │     │ genero      │     │ tipo        │
│ tipo_documento│   │ estado      │     └──────┬──────┘
│ nro_documento│    └──────┬──────┘            │
│ celular     │            │                   │
│ genero      │            │                   │
│ direccion   │            ▼                   │
│ foto        │     ┌─────────────┐            │
│ estado      │     │   tickets   │◄───────────┘
└──────┬──────┘     ├─────────────┤
       │            │ id          │
       │            │ espacio_id  ├───────►┌─────────────┐
       │            │ cliente_id  │        │  espacios   │
       │            │ vehiculo_id │        ├─────────────┤
       └───────────►│ usuario_id  │        │ id          │
                    │ tarifa_id   ├───────►│ numero      │
                    │ codigo_ticket         │ estado      │
                    │ fecha_ingreso│        └─────────────┘
                    │ hora_ingreso│
                    │ fecha_salida│  ┌─────────────┐
                    │ hora_salida │  │   tarifas   │
                    │ tiempo_total│◄─├─────────────┤
                    │ monto_total │  │ id          │
                    │ estado_ticket  │ nombre      │
                    └──────┬──────┘  │ tipo        │
                           │         │ costo       │
                           ▼         │ cantidad    │
                    ┌─────────────┐  │ minutos_gracia│
                    │facturacions │  └─────────────┘
                    ├─────────────┤
                    │ id          │
                    │ ticket_id   │
                    │ usuario_id  │
                    │ nro_factura │
                    │ nombre_cliente │
                    │ monto       │
                    └─────────────┘
```

### Descripción de Tablas

#### Tabla: `users`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| name | varchar | Nombre de usuario |
| email | varchar | Correo electrónico (único) |
| password | varchar | Contraseña encriptada |
| nombres | varchar | Nombres completos |
| apellidos | varchar | Apellidos |
| tipo_documento | enum | DNI, Carnet Extranjería, Pasaporte, RUC |
| nro_documento | varchar | Número de documento (único) |
| celular | varchar | Teléfono celular |
| fecha_nacimiento | varchar | Fecha de nacimiento |
| genero | enum | Masculino, Femenino |
| direccion | varchar | Dirección |
| foto | varchar | Ruta de foto (nullable) |
| contacto_nombre | varchar | Nombre contacto emergencia |
| contacto_telefono | varchar | Teléfono contacto |
| contacto_parentesco | varchar | Parentesco contacto |
| estado | boolean | Estado activo/inactivo |

#### Tabla: `clientes`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| nombres | varchar | Nombres del cliente |
| nro_documento | varchar | Número de documento |
| email | varchar | Correo electrónico |
| celular | varchar | Teléfono celular |
| genero | enum | Masculino, Femenino |
| estado | boolean | Estado activo/inactivo |

#### Tabla: `vehiculos`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| cliente_id | bigint | FK a clientes |
| placa | varchar | Placa del vehículo (única) |
| marca | varchar | Marca del vehículo |
| modelo | varchar | Modelo del vehículo |
| color | varchar | Color del vehículo |
| tipo | enum | auto, camioneta, mototaxi, camion |

#### Tabla: `espacios`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| numero | varchar | Número de espacio (único) |
| estado | enum | libre, ocupado, mantenimiento |

#### Tabla: `tarifas`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| nombre | enum | regular, nocturna, fin_de_semana, feriados |
| tipo | enum | hora, dia, noche |
| costo | decimal(10,2) | Costo de la tarifa |
| cantidad | int | Cantidad de unidades |
| minutos_de_gracia | int | Minutos de tolerancia |

#### Tabla: `tickets`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| espacio_id | bigint | FK a espacios |
| cliente_id | bigint | FK a clientes |
| vehiculo_id | bigint | FK a vehiculos |
| tarifa_id | bigint | FK a tarifas |
| usuario_id | bigint | FK a users |
| codigo_ticket | varchar | Código único del ticket |
| fecha_ingreso | date | Fecha de entrada |
| hora_ingreso | time | Hora de entrada |
| fecha_salida | date | Fecha de salida (nullable) |
| hora_salida | time | Hora de salida (nullable) |
| tiempo_total | varchar | Tiempo total estacionado |
| monto_total | decimal(10,2) | Monto a pagar |
| estado_ticket | enum | activo, completado, cancelado |
| obs | varchar | Observaciones |

#### Tabla: `facturacions`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| ticket_id | bigint | FK a tickets |
| usuario_id | bigint | FK a users |
| nro_factura | int | Número de factura (único) |
| nombre_cliente | varchar | Nombre del cliente |
| nro_documento | varchar | Documento del cliente |
| placa | varchar | Placa del vehículo |
| detalle | varchar | Detalle del servicio |
| monto | decimal(10,2) | Monto facturado |

#### Tabla: `ajustes`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| nombre | varchar | Nombre del negocio |
| descripcion | text | Descripción |
| sucursal | varchar | Nombre de sucursal |
| direccion | text | Dirección |
| telefonos | varchar | Teléfonos de contacto |
| logo | varchar | Logo principal |
| logo_auto | varchar | Logo secundario |
| divisa | varchar | Moneda (ej: PEN, USD) |
| correo | varchar | Correo de contacto |
| pagina_web | varchar | Página web (nullable) |

---

## 📦 Módulos del Sistema

### 1. Dashboard (`AdminController`)
- Vista general del sistema
- Estadísticas rápidas
- Accesos directos a módulos

### 2. Ajustes del Sistema (`AjusteController`)
- Configuración general del negocio
- Logos e información de contacto
- Configuración de divisa

### 3. Gestión de Usuarios (`UserController`)
- CRUD completo de usuarios
- Asignación de roles
- Perfil de usuario
- Soft delete con restauración

### 4. Roles y Permisos (`RoleController`)
- Creación de roles
- Asignación de permisos granulares
- Basado en Spatie Permission

### 5. Gestión de Espacios (`EspacioController`)
- CRUD de espacios de parqueo
- Estados: libre, ocupado, mantenimiento
- Numeración única

### 6. Gestión de Tarifas (`TarifaController`)
- Configuración de tarifas
- Tipos: hora, día, noche
- Categorías: regular, nocturna, fin de semana, feriados
- Minutos de gracia configurables

### 7. Gestión de Clientes (`ClienteController`)
- CRUD de clientes
- Soft delete con restauración
- Vinculación con vehículos

### 8. Gestión de Vehículos (`VehiculoController`)
- Registro de vehículos por cliente
- Tipos: auto, camioneta, mototaxi, camión
- Placa única

### 9. Sistema de Tickets (`TicketController`)
- Registro de entrada de vehículos
- Búsqueda de vehículos
- Cálculo automático de tiempo y monto
- Finalización de tickets
- Impresión de tickets

### 10. Facturación (`FacturacionController`)
- Generación de facturas
- Impresión de comprobantes
- Historial de facturación

### 11. Reportes (`ReporteController`)
- Reporte de ingresos diarios
- Reporte semanal
- Reporte mensual
- Exportación a PDF

---

## 🛣 Rutas de la API

### Autenticación
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/login` | Formulario de login |
| POST | `/login` | Procesar login |
| POST | `/logout` | Cerrar sesión |
| GET | `/register` | Formulario de registro |
| POST | `/register` | Procesar registro |

### Panel de Administración
| Método | Ruta | Controlador | Descripción |
|--------|------|-------------|-------------|
| GET | `/admin` | `AdminController@index` | Dashboard |
| GET | `/perfil` | `UserController@perfil` | Mi perfil |
| POST | `/perfil` | `UserController@perfilUpdate` | Actualizar perfil |

### Usuarios
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/usuarios` | Listar usuarios |
| GET | `/admin/usuarios/create` | Formulario crear |
| POST | `/admin/usuarios/create` | Guardar usuario |
| GET | `/admin/usuario/{id}` | Ver usuario |
| GET | `/admin/usuario/{id}/edit` | Editar usuario |
| PUT | `/admin/usuario/{id}` | Actualizar usuario |
| DELETE | `/admin/usuario/{id}` | Eliminar usuario |
| POST | `/admin/usuario/{id}/restaurar` | Restaurar usuario |

### Roles
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/roles` | Listar roles |
| GET | `/admin/roles/create` | Crear rol |
| POST | `/admin/roles/create` | Guardar rol |
| GET | `/admin/rol/{id}/edit` | Editar rol |
| PUT | `/admin/rol/{id}` | Actualizar rol |
| DELETE | `/admin/rol/{id}` | Eliminar rol |
| GET | `/admin/rol/{id}/permisos` | Ver permisos |
| POST | `/admin/rol/{id}/permisos` | Actualizar permisos |

### Espacios
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/espacios` | Listar espacios |
| GET | `/admin/espacios/create` | Crear espacio |
| POST | `/admin/espacios/create` | Guardar espacio |
| GET | `/admin/espacio/{id}/edit` | Editar espacio |
| PUT | `/admin/espacio/{id}` | Actualizar espacio |
| DELETE | `/admin/espacio/{id}` | Eliminar espacio |

### Tarifas
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/tarifas` | Listar tarifas |
| GET | `/admin/tarifas/create` | Crear tarifa |
| POST | `/admin/tarifas/create` | Guardar tarifa |
| GET | `/admin/tarifa/{id}/edit` | Editar tarifa |
| PUT | `/admin/tarifa/{id}` | Actualizar tarifa |
| DELETE | `/admin/tarifa/{id}` | Eliminar tarifa |

### Clientes
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/clientes` | Listar clientes |
| GET | `/admin/clientes/create` | Crear cliente |
| POST | `/admin/clientes/create` | Guardar cliente |
| GET | `/admin/cliente/{id}` | Ver cliente |
| GET | `/admin/cliente/{id}/edit` | Editar cliente |
| PUT | `/admin/cliente/{id}` | Actualizar cliente |
| DELETE | `/admin/cliente/{id}` | Eliminar cliente |
| POST | `/admin/cliente/{id}/restaurar` | Restaurar cliente |

### Vehículos
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/vehiculos` | Listar vehículos |
| POST | `/admin/clientes/vehiculos/create` | Crear vehículo |
| PUT | `/admin/clientes/vehiculo/{id}` | Actualizar vehículo |
| DELETE | `/admin/clientes/vehiculo/{id}` | Eliminar vehículo |

### Tickets
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/tickets` | Listar tickets |
| POST | `/admin/tickets/create` | Crear ticket |
| GET | `/admin/tickets/vehiculo/{id}` | Buscar vehículo |
| GET | `/admin/ticket/{id}/imprimir` | Imprimir ticket |
| POST | `/admin/ticket/actualizar_tarifa` | Actualizar tarifa |
| GET | `/admin/ticket/{id}/finalizar_ticket` | Finalizar ticket |
| DELETE | `/admin/ticket/{id}` | Eliminar ticket |

### Facturación
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/facturacion` | Listar facturas |
| GET | `/admin/factura/{id}` | Imprimir factura |

### Reportes
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/reportes` | Panel de reportes |
| GET | `/admin/reportes/semanal` | Reporte semanal |
| GET | `/admin/reportes/mensual` | Reporte mensual |
| GET | `/admin/reportes/ingresosdiarios` | Ingresos diarios |

### Ajustes
| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/admin/ajustes` | Ver ajustes |
| POST | `/admin/ajustes/create` | Guardar ajustes |

---

## 🔐 Autenticación y Autorización

### Sistema de Autenticación
- **Laravel UI**: Sistema de autenticación completo
- Registro, login, logout
- Recuperación de contraseña
- Verificación de email

### Sistema de Permisos
- **Spatie Laravel Permission**: Gestión de roles y permisos
- Permisos granulares por módulo
- Middleware de autorización

### Lista de Permisos Disponibles
```
# Perfil
- perfil
- perfil.update

# Dashboard
- admin.index

# Ajustes
- admin.ajustes.index
- admin.ajustes.create

# Roles
- admin.roles.index
- admin.roles.create
- admin.roles.store
- admin.roles.edit
- admin.roles.update
- admin.roles.destroy
- admin.roles.permisos
- admin.roles.update.permisos

# Usuarios
- admin.usuarios.index
- admin.usuarios.create
- admin.usuarios.store
- admin.usuarios.show
- admin.usuarios.edit
- admin.usuarios.update
- admin.usuarios.destroy
- admin.usuarios.restore

# Espacios
- admin.espacios.index
- admin.espacios.create
- admin.espacios.store
- admin.espacios.edit
- admin.espacios.update
- admin.espacios.destroy

# Tarifas
- admin.tarifas.index
- admin.tarifas.create
- admin.tarifas.store
- admin.tarifas.edit
- admin.tarifas.update
- admin.tarifas.destroy

# Clientes
- admin.clientes.index
- admin.clientes.create
- admin.clientes.store
- admin.clientes.show
- admin.clientes.edit
- admin.clientes.update
- admin.clientes.destroy
- admin.clientes.restore

# Vehículos
- admin.vehiculos.index
- admin.clientes.vehiculos.store
- admin.clientes.vehiculos.update
- admin.clientes.vehiculos.destroy

# Tickets
- admin.tickets.index
- admin.tickets.store
- admin.tickets.buscar_vehiculo
- admin.tickets.imprimir_ticket
- admin.tickets.actualizar_tarifa
- admin.tickets.finalizar_ticket
- admin.tickets.destroy

# Facturación
- admin.facturacion.index
- admin.facturacion.imprimir_factura

# Reportes
- admin.reportes.index
- admin.reportes.semanal
- admin.reportes.mensual
- admin.reportes.ingresosdiarios
```

---

## 📚 Dependencias

### Dependencias de Producción

| Paquete | Versión | Descripción |
|---------|---------|-------------|
| `laravel/framework` | ^12.0 | Framework Laravel |
| `laravel/ui` | ^4.6 | Scaffolding de autenticación |
| `jeroennoten/laravel-adminlte` | ^3.15 | Template AdminLTE |
| `spatie/laravel-permission` | ^6.23 | Gestión de roles y permisos |
| `barryvdh/laravel-dompdf` | ^3.1 | Generación de PDFs |
| `milon/barcode` | ^12.0 | Generación de códigos de barras |

### Dependencias de Desarrollo

| Paquete | Versión | Descripción |
|---------|---------|-------------|
| `fakerphp/faker` | ^1.23 | Generación de datos falsos |
| `laravel/pint` | ^1.24 | Code styling |
| `laravel/sail` | ^1.41 | Docker development |
| `phpunit/phpunit` | ^11.5.3 | Testing |

---

## 🔧 Comandos Útiles

### Desarrollo
```bash
# Iniciar servidor de desarrollo
php artisan serve

# Iniciar con hot reload (Vite)
npm run dev

# Ejecutar todo en paralelo
composer dev
```

### Base de Datos
```bash
# Ejecutar migraciones
php artisan migrate

# Revertir última migración
php artisan migrate:rollback

# Resetear y migrar todo
php artisan migrate:fresh

# Ejecutar seeders
php artisan db:seed
```

### Cache
```bash
# Limpiar cache de configuración
php artisan config:clear

# Limpiar cache de rutas
php artisan route:clear

# Limpiar cache de vistas
php artisan view:clear

# Limpiar todo el cache
php artisan cache:clear
```

### Optimización
```bash
# Cachear configuración
php artisan config:cache

# Cachear rutas
php artisan route:cache

# Cachear vistas
php artisan view:cache

# Optimizar para producción
php artisan optimize
```

### Testing
```bash
# Ejecutar tests
php artisan test

# O con composer
composer test
```

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

---

## 👥 Autores

- Desarrollador Principal - *Sistema ParkCore*

---

<p align="center">
  <strong>Sistema ParkCore</strong> - Gestión Inteligente de Parqueaderos<br>
  Desarrollado con ❤️ usando Laravel 12
</p>
