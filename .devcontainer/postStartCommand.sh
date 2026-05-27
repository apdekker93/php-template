#!/bin/bash

# Start MySQL
sudo service mysql start

until mysql -u root -proot -e "SELECT 1" &>/dev/null; do
    sleep 1
done

# Zet root-wachtwoord van MySQL
sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root'; FLUSH PRIVILEGES;" 2>/dev/null || true
