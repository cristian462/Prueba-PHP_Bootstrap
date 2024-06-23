FROM php:8.0-apache

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar los archivos de la aplicación al contenedor
COPY . /var/www/html/

# Copiar configuración de Apache
COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Exponer el puerto 80 para HTTP
EXPOSE 80

# Comando por defecto para iniciar Apache en primer plano
CMD ["apache2-foreground"]


# FROM php:8.0-apache

# # Instalar extensiones PHP necesarias
# RUN docker-php-ext-install pdo pdo_mysql mysqli

# # Copiar los archivos de la aplicación al contenedor
# COPY . /var/www/html/

# # Copiar configuración de Apache
# COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# # Copiar el script de entrada
# COPY entrypoint.sh /entrypoint.sh

# # Asegurar permisos de ejecución para el script de entrada
# RUN chmod +x /entrypoint.sh

# # Exponer el puerto 80 para HTTP
# EXPOSE 80

# # Usar el script de entrada por defecto
# ENTRYPOINT ["/entrypoint.sh"]


