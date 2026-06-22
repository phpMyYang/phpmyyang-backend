# Gagamit tayo ng PHP 8.2 na may built-in na Apache server
FROM php:8.2-apache

# 1. I-install ang mga system dependencies (Idinagdag natin ang libzip-dev)
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev

# 2. I-install ang PHP extensions (Idinagdag natin ang zip)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 3. Paganahin ang Apache URL Rewrite
RUN a2enmod rewrite

# 4. I-set ang /public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. I-copy ang code papasok sa server
COPY . /var/www/html

# 6. I-install ang Composer (Idinagdag natin ang --no-scripts para hindi mag-crash dahil sa nawawalang .env)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --optimize-autoloader --no-dev --no-scripts

# 7. I-set ang tamang permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80