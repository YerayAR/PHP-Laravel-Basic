#!/bin/bash

# Deployment script for production environments.
# The `set -e` option stops the script if any command fails.
set -e

# Install only production dependencies and optimize the autoloader
composer install --no-dev --optimize-autoloader

# Cache configuration files, route definitions and views for speed
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ensure storage and cache directories are writable by the web server
chmod -R ug+rwx storage bootstrap/cache


