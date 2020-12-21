FROM php:7.4-fpm

ARG USER_ID
ARG GROUP_ID

WORKDIR /var/www/app

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        smbclient \
        procps \
        nano \
        git \
        unzip \
        libicu-dev \
        zlib1g-dev \
        libxml2 \
        libxml2-dev \
        libreadline-dev \
        supervisor \
        cron \
        libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo pdo_mysql

COPY ./php/php.ini /usr/local/etc/php/php.ini

RUN usermod -u $USER_ID www-data && groupmod -g $GROUP_ID www-data

RUN chown -R www-data:www-data .
