# Documentacion del Proyecto

## Introducción

Este repositorio contiene un proyecto base de **Laravel 11** diseñado para
mostrar un panel de control con estética cyberpunk. Provee autenticación,
roles de usuario y un módulo CRUD para administrar **Network Nodes**.

### Tecnologías

- **PHP 8.3**
- **Laravel 11**
- **Blade** para las vistas
- **MySQL** o cualquier base de datos soportada por Laravel
- **CSS** personalizado de estilo cyberpunk

La arquitectura sigue el patrón **MVC** propio de Laravel.

## Estructura de Archivos

- `app/` – Contiene la lógica de la aplicación.
  - `Console/Kernel.php` – Agenda y registra comandos de consola.
  - `Exceptions/Handler.php` – Manejador global de excepciones.
  - `Http/` – Kernel HTTP, controladores y middleware.
    - `Controllers/` – Controladores como `AuthController`, `DashboardController`
      y `NodeController`.
    - `Middleware/` – Capas de middleware de autenticación y seguridad.
  - `Models/` – Modelos `User` y `Node` usados por Eloquent.
- `bootstrap/app.php` – Crea la instancia principal de la aplicación.
- `config/app.php` – Configuración básica (nombre, entorno, zona horaria).
- `database/migrations/` – Migraciones para crear las tablas `users` y `nodes`.
- `public/` – Punto de entrada HTTP y archivos estáticos (CSS).
- `resources/views/` – Plantillas Blade para autenticación, dashboard y nodos.
- `routes/web.php` – Definición de rutas web.
- `scripts/deploy.sh` – Script de despliegue para producción.

## Diagramas de Interconexión

```
[ Navegador ]
     |
     v
[ routes/web.php ] --(según URL)--> [ Controladores ]
     |                                    |
     |                                    v
     |                           [ Modelos / Base de Datos ]
     |                                    |
     v                                    v
[ Vistas Blade ]  <-------------------  Respuesta
```

El módulo de Nodes se maneja vía `NodeController` y las vistas del directorio
`resources/views/nodes`. La autenticación usa `AuthController` y middleware
`Authenticate` para proteger rutas internas.
