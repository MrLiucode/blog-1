#!/bin/sh
echo 'composer install...'
    composer install
echo 'composer installed!'
echo 'start building live...'
    rm .env -f
echo '.env removed!'
    cp config_env/.env.dev .env
echo '.env generated from config_env/.env.dev!'
    php artisan config:clear
    php artisan route:clear
echo 'php artisan config:cache...'
    php artisan config:cache
echo 'php artisan config:cache done!'
echo 'php artisan route:cache...'
    php artisan route:cache
echo 'php artisan route:cache done!'
    php artisan migrate
