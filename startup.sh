#!/bin/bash

# Copiar nginx.conf si existe (no mover para evitar problemas de permisos)
if [ -f /home/site/wwwroot/nginx.conf ]; then
    cp /home/site/wwwroot/nginx.conf /etc/nginx/nginx.conf
    chmod 644 /etc/nginx/nginx.conf
fi

# Arrancar php-fpm en background
php-fpm -D

# Arrancar nginx en primer plano (requisito contenedor)
nginx -g 'daemon off;'
