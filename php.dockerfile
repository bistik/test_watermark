FROM php:7.4-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN apk update && \
    apk add \
    $PHPIZE_DEPS \
    imagemagick \
    imagemagick-libs \
    imagemagick-dev \
    php7-imagick \
    php7-gd \
    ghostscript \
    libgd \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev

RUN docker-php-ext-install pdo pdo_mysql gd

RUN pecl install imagick \
    && docker-php-ext-enable --ini-name 20-imagick.ini imagick
