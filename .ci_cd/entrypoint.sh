#!/bin/bash

if [ ! -d /var/www/html/system/vendor ]; then
    echo "Instalando as dependências do PHP via Composer..."
    composer install --no-interaction --prefer-dist
fi

echo "Aplicando as permissões necessárias..."
mkdir -p /var/www/html/system/logs
touch /var/www/html/system/logs/app.log
chown -R www-data:www-data /var/www/html/system/logs
chmod -R 777 /var/www/html/system/logs
chmod -R 777 /var/www/html/system/logs/app.log

echo "Iniciando Apache..."
exec apache2-foreground