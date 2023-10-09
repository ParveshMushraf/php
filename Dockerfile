FROM php:7.2-apache

#Install musqli
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html/

COPY . /var/www/html/


