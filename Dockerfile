FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip

RUN docker-php-ext-install pdo pdo_mysql

# Composer install (FIXED)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# SQLite DB ensure + permissions (IMPORTANT FOR RENDER)
RUN mkdir -p database \
    && touch database/database.sqlite \
    && chmod -R 777 storage bootstrap/cache database

RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
