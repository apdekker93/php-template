#!/bin/bash

# Configure git settings
git config pull.rebase false
git config merge.ours.driver true
git config --global merge.conflictStyle diff3

# PHP foutmeldingen tonen in de browser (handig tijdens ontwikkeling)
PHP_INI_DIR=$(php --ini | grep "Scan for" | awk -F': ' '{print $2}' | tr -d '"')
echo "display_errors = On
display_startup_errors = On
error_reporting = E_ALL" | sudo tee "$PHP_INI_DIR/99-debug.ini" > /dev/null

# Pakketlijsten bijwerken
sudo apt-get update -qq

# MySQL server en MySQL client installeren
sudo apt-get install -y -qq default-mysql-server default-mysql-client

# PHP mysqli-extensie compileren en inschakelen
sudo docker-php-ext-install mysqli
PHP_INI_DIR=$(php --ini | grep "Scan for" | awk -F': ' '{print $2}' | tr -d '"')
echo "extension=mysqli.so" | sudo tee "$PHP_INI_DIR/docker-php-ext-mysqli.ini" > /dev/null
echo "mysqli.default_socket=/run/mysqld/mysqld.sock" | sudo tee "$PHP_INI_DIR/mysql-socket.ini" > /dev/null

# start-server beschikbaar maken als commando
printf '#!/bin/bash\nbash "%s/start-server.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/start-server

# update-template beschikbaar maken als commando
printf '#!/bin/bash\nbash "%s/update-template.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/update-template