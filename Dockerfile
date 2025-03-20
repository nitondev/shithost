FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y \
    nano \
    default-mysql-client \
    apache2-utils \
    cron \
    && docker-php-ext-install mysqli

RUN a2enmod rewrite

COPY ./src /var/www/html/

CMD apache2-foreground

RUN mkdir -p /var/log/shithost && \
    chmod -R 777 /var/log/shithost

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/files

ENV APACHE_DOCUMENT_ROOT=/var/www/html

EXPOSE 80
