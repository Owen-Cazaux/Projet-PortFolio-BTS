FROM php:8.4-fpm-alpine
WORKDIR /var/www/html
RUN apk add --no-cache nginx supervisor \
	&& docker-php-ext-install pdo pdo_mysql
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.* ./
RUN composer install --no-dev --optimize-autoloader
COPY . .
COPY docker/nginx.conf.template /etc/nginx/templates/nginx.conf.template
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint
ENV PORT=10000
EXPOSE 10000
ENTRYPOINT ["docker-entrypoint"]