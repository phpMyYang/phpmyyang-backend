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

# 6. I-install ang Composer (Superuser mode, Unlimited RAM, at Force Install)
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --optimize-autoloader --no-dev --no-scripts --ignore-platform-reqs

# 7. Siguraduhing may folders bago i-set ang tamang permissions
RUN mkdir -p /var/www/html/storage/framework/views \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# Ang magic trick: Kukunin nito ang Render Environment Variables 
# at isusulat sa isang .env file bago buhayin ang server.
CMD sh -c "printenv > /var/www/html/.env && apache2-foreground"