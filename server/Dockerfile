FROM php:7.4.12-fpm-alpine AS dev
ADD . /app
WORKDIR /app
RUN wget https://getcomposer.org/installer
RUN php installer --install-dir=/usr/local/bin/ --filename=composer
RUN rm installer
RUN composer install --no-interaction --optimize-autoloader
