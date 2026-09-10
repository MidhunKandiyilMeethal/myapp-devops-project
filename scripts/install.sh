#!/bin/bash
sudo apt update -y
sudo apt install apache2 php libapache2-mod-php -y
sudo cp -r /var/www/html/src/* /var/www/html/ 2>/dev/null || true
sudo cp /var/www/html/index.html /var/www/html/index.php 2>/dev/null || true
sudo chown -R www-data:www-data /var/www/html
sudo systemctl enable apache2
sudo systemctl restart apache2
