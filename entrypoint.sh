#!/bin/bash
set -e

echo "Iniciando entrypoint..."

# Ejemplo de depuración: Verificar la presencia de archivos o variables
ls -la /var/www/html
echo "Valor de alguna_variable: $ALGUNA_VARIABLE"

# Habilitar mod_rewrite si no está habilitado
echo "Habilitando mod_rewrite..."
a2enmod rewrite

# Reiniciar Apache
echo "Reiniciando Apache..."
service apache2 restart

# Iniciar Apache en primer plano
apache2-foreground


