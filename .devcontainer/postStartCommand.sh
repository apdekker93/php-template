#!/bin/bash

# Start MySQL als Docker-container
# Eerste keer: aanmaken; daarna: bestaande container herstarten
docker run -d --name mysql \
    -e MYSQL_ROOT_PASSWORD=root \
    -p 127.0.0.1:3306:3306 \
    mysql:8.0 2>/dev/null || docker start mysql

# Wacht tot MySQL klaar is
until mysql -h 127.0.0.1 -u root -proot -e "SELECT 1" &>/dev/null; do
    sleep 1
done

# Importeer database.sql zodat tabellen altijd beschikbaar zijn
if [ -f "database.sql" ]; then
    mysql -h 127.0.0.1 -u root -proot < database.sql 2>/dev/null || true
fi