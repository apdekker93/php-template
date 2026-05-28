#!/bin/bash

# Wacht tot MySQL klaar is
until mysql -h 127.0.0.1 -u root -proot -e "SELECT 1" &>/dev/null; do
    sleep 1
done

# Importeer database.sql zodat tabellen altijd beschikbaar zijn
if [ -f "database.sql" ]; then
    mysql -h 127.0.0.1 -u root -proot < database.sql 2>/dev/null || true
fi