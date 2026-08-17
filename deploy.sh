#!/bin/bash

# Fix permissions first so git and composer don't get permission denied
sudo chown -R $USER:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Reset any local changes to avoid merge conflicts
git reset --hard HEAD
git clean -df

# Update codebase
git pull

# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node dependencies
npm install

# Build frontend assets
npm run build

# Clear caches
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
php artisan migrate --force

# Set permissions
sudo chown -R $USER:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo "Deployment finished successfully!"
