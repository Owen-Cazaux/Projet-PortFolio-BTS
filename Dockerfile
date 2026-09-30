FROM php:8.4-fpm-alpine
WORKDIR /var/www/html
RUN docker-php-ext-install pdo pdo_mysql
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.* ./
RUN composer install --no-dev --optimize-autoloader
COPY . .
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html"]