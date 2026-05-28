#!/bin/bash

# Start MariaDB
sudo service mariadb start

# Wacht tot MariaDB klaar is
until sudo mysql -u root -e "SELECT 1" &>/dev/null; do
    sleep 1
done

# Sta zowel socket- als wachtwoordverbindingen toe
sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED VIA unix_socket OR mysql_native_password USING PASSWORD('root'); FLUSH PRIVILEGES;" 2>/dev/null || true

# Importeer database.sql zodat tabellen altijd beschikbaar zijn
if [ -f "database.sql" ]; then
    sudo mysql -u root -proot < database.sql 2>/dev/null || true
fi