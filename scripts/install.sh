#!/bin/bash
sudo chown -R apache:apache /var/www/html
sudo systemctl restart httpd
