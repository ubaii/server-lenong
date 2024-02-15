#!/bin/bash
apt-get update -y
apt-get upgrade -y
apt-get install software-properties-common
apt-get install nginx -y
add-apt-repository ppa:ondrej/php -y
apt-get update
apt-get install php8.1 php8.1-fpm
rm /etc/nginx/sites-available/default
curl -Lo /etc/nginx/sites-available/default https://snippet.host/gcwjkj/raw
chown -R www-data:www-data /var/www/
chmod -R 775 /var/www/
nginx -t
systemctl restart nginx
