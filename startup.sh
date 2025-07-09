#!/bin/bash

# Copiar nginx.conf si existe (no mover para evitar problemas de permisos)
if [ -f /home/site/wwwroot/nginx.conf ]; then
    cp /home/site/wwwroot/nginx.conf /etc/nginx/nginx.conf
    chmod 644 /etc/nginx/nginx.conf
fi
# Iniciar PHP-FPM si no está en ejecución
if ! pgrep php-fpm > /dev/null; then
    php-fpm -y /usr/local/etc/php-fpm.conf -D
fi

# Arrancar nginx en primer plano (requisito contenedor)
nginx -g 'daemon off;'
