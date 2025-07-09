#!/bin/bash

# Mover nginx.conf al lugar correcto
mv /home/site/wwwroot/nginx.conf /etc/nginx/nginx.conf

# Permisos para nginx.conf
chmod 644 /etc/nginx/nginx.conf

# Recargar nginx para que coja la configuración
nginx -s reload

# Arrancar php-fpm si no está en ejecución
if ! pgrep php-fpm > /dev/null; then
    php-fpm -D
fi

# Arrancar nginx en primer plano (requisito contenedor)
nginx -g 'daemon off;'
