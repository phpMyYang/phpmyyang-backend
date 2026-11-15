FROM php:8.4-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libsqlite3-dev

RUN docker-php-ext-install mbstring pcntl bcmath zip pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN git config --global --add safe.directory /var/www/html && \
    composer install --no-interaction --prefer-dist --optimize-autoloader

RUN mkdir -p /var/www/html/storage/framework/views \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache \
    && touch /var/www/html/database/database.sqlite \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 8000

CMD sh -c "cp /etc/secrets/.env /var/www/html/.env 2>/dev/null || true && touch /var/www/html/database/database.sqlite && php artisan migrate --force && php artisan optimize:clear && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"