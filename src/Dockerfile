FROM php:8.1-fpm

# system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY src/ .

RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 777 storage bootstrap/cache

CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php -S 0.0.0.0:$(echo $PORT | sed 's/[^0-9]//g') -t public"]




