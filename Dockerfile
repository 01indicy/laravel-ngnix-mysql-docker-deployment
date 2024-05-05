FROM composer:latest as build
WORKDIR /lumen-ci
COPY . /lumen-ci
RUN composer install

FROM nginx:stable-alpine as server
COPY --from=build /lumen-ci /var/www/html
COPY docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf

FROM php:8.2-fpm
WORKDIR /var/www/html
RUN docker-php-ext-install pdo pdo_mysql
COPY --from=build /lumen-ci /var/www/html
