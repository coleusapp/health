# Use official PHP image as base
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    mariadb-client \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set file permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Copy nginx configuration (for later use in a reverse proxy if needed)
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000

CMD ["php-fpm"]
