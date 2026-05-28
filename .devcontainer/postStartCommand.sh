#!/bin/bash

sudo service mysql start

# Wacht tot MySQL klaar is
until mysql -h 127.0.0.1 -u root -proot -e "SELECT 1" &>/dev/null; do
    sleep 1
done

sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root'; FLUSH PRIVILEGES;" 2>/dev/null || true

# Importeer database.sql zodat tabellen altijd beschikbaar zijn
if [ -f "database.sql" ]; then
    mysql -h 127.0.0.1 -u root -proot < database.sql 2>/dev/null || true
fi