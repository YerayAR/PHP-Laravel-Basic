# Cyberpunk Laravel Starter

A basic Laravel 11 project running on PHP 8.3. It provides a cyberpunk themed dashboard with authentication, role-based access, and a CRUD module for managing **Network Nodes**. Use it as a starting point for futuristic web applications.

## Installation

Clone the project and run the setup in one command:

```bash
git clone https://github.com/youruser/PHP-Laravel-Basic.git \
  && cd PHP-Laravel-Basic \
  && composer install \
  && cp .env.example .env \
  && php artisan key:generate \
  && php artisan migrate \
  && php artisan serve
```

Before running migrations, edit `.env` to match your local database. Update the
following fields (example values shown for a MySQL setup):

```
DB_DATABASE=cyberpunk
DB_USERNAME=root
DB_PASSWORD=secret
```

## Features

- User registration and login with email validation.
- Editable user profile dashboard.
- Role-based access control (admin and user).
- CRUD operations for Network Nodes.
- Dark cyberpunk theme using custom CSS (or integrate Tailwind CSS).

## Tech Stack

- PHP 8.3
- Laravel 11
- Blade templates
- MySQL (or any Laravel supported database)
- Custom CSS inspired by Cyberpunk aesthetics

## Credits

Released under the MIT license. Feel free to build upon this template for your own projects.

## Screenshots

_Add screenshots here_

## Production Deployment

1. Copy `.env.example` to `.env` and update the database credentials.
2. Verify that `APP_ENV=production` and `APP_DEBUG=false` are set.
3. Run the deploy script to install optimized dependencies and generate caches:

```bash
./scripts/deploy.sh
```

The script executes `composer install --no-dev --optimize-autoloader`, caches
configuration, routes and views, and sets write permissions for
`storage/` and `bootstrap/cache/`.

Ensure your `.env` file is not exposed publicly through the web server.

