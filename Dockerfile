FROM php:8.0-apache


RUN docker-php-ext-install pdo pdo_mysql mysqli && a2enmod rewrite && service apache2 restart


COPY . /var/www/html/


COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf


EXPOSE 80


CMD ["apache2-foreground"]