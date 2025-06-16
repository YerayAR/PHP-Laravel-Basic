#!/bin/bash
set -e

# Install production dependencies
composer install --no-dev --optimize-autoloader

# Cache configuration, routes, and views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
chmod -R ug+rwx storage bootstrap/cache


