FROM php:7.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql 
RUN apt-get update \
    && apt-get install -y \
        nmap \
        vim
        
RUN a2enmod rewrite

COPY . /var/www/html/