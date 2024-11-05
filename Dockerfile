FROM php:8.3-fpm

RUN apt-get update \
    && apt-get install -y \
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
    libfreetype6-dev  \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . /var/www

RUN composer install --no-interaction --prefer-dist --optimize-autoloader \
    && chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

EXPOSE 9000

CMD ["php-fpm"]
