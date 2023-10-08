FROM php:7.8:alphine

WORKDIR /var/www/html/

COPY . /var/www/html/

RUN sh install_php.sh

