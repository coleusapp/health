FROM php:8.3-fpm

RUN  --mount=type=bind,from=mlocati/php-extension-installer:latest,source=/usr/bin/install-php-extensions,target=/usr/local/bin/install-php-extensions \
    install-php-extensions pdo_mysql mbstring exif pcntl bcmath gd zip intl

WORKDIR /var/www

COPY . /var/www

RUN --mount=type=bind,from=composer:latest,source=/usr/bin/composer,target=/usr/bin/composer \
    composer install --no-interaction --prefer-dist --optimize-autoloader  \
    && chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

EXPOSE 9000

CMD ["php-fpm"]
