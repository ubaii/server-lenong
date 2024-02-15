#!/bin/bash

read -p 'Nama domain : ' domainname

nginx_config="server {
  listen 80;
  listen [::]:80;
  root /var/www/$domainname/html;

  index index.php index.html index.htm index.nginx-debian.html;

  server_name $domainname www.$domainname;

  location / {
    try_files \$uri \$uri/ =404;
  }

  location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php8.1-fpm.sock;
  }

  location ~ /\.ht {
    deny all;
  }
}"

echo "$nginx_config" > /etc/nginx/sites-available/$domainname
ln -s /etc/nginx/sites-available/$domainname /etc/nginx/sites-enabled/
mkdir /var/www/$domainname
mkdir /var/www/$domainname/html
chown -R www-data:www-data /var/www/
chmod -R 775 /var/www/
systemctl restart nginx
echo "Nginx configuration for $domainname has been created and applied."
