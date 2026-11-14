# Use PHP 8.4 for composer.lock
FROM php:8.4-cli

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev

# Install PHP extensions
RUN docker-php-ext-install mbstring pcntl bcmath zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy backend code
COPY . .

# Allow the directory into git and install the dependencies with ignored platform reqs to be sure
RUN git config --global --add safe.directory /var/www/html && \
    composer install --no-interaction --prefer-dist --optimize-autoloader

# Fix ownership at permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000

# Run Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]