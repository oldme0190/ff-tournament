FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl nodejs npm

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

# 🔥 FRONTEND BUILD (IMPORTANT)
RUN npm install
RUN npm run build

RUN mkdir -p database \
    && touch database/database.sqlite \
    && chmod -R 777 storage bootstrap/cache database

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
