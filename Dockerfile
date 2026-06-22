# Gagamit tayo ng PHP 8.2 na may built-in na Apache server
FROM php:8.2-apache

# I-install ang mga kailangang system files para sa Laravel
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip

# I-install ang PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Paganahin ang Apache URL Rewrite (Kailangan ito para gumana ang /api routes)
RUN a2enmod rewrite

# I-set ang /public folder ng Laravel bilang main entrance ng website
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# I-copy ang buong Laravel code mo papasok sa server
COPY . /var/www/html

# I-install ang Composer para ma-download ang dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --optimize-autoloader --no-dev

# I-set ang tamang permissions para makapag-save ng cache at logs ang Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Buksan ang port 80
EXPOSE 80