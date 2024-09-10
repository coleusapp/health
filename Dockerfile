FROM php:8.3-fpm-alpine

WORKDIR /var/www

COPY . /var/www

RUN  --mount=type=bind,from=mlocati/php-extension-installer:latest,source=/usr/bin/install-php-extensions,target=/usr/local/bin/install-php-extensions install-php-extensions gd pdo mbstring exif bcmath gd intl zip && \
     --mount=type=bind,from=composer:2,source=/usr/bin/composer,target=/usr/bin/composer composer install --no-dev --no-interaction && \
    chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
