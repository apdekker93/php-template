#!/bin/bash

# Configure git settings
git config pull.rebase false
git config merge.ours.driver true
git config --global merge.conflictStyle diff3

# PHP foutmeldingen tonen in de browser (handig tijdens ontwikkeling)
PHP_INI_DIR=$(php --ini | grep "Scan for" | awk -F': ' '{print $2}')
echo "display_errors = On
display_startup_errors = On
error_reporting = E_ALL" | sudo tee "$PHP_INI_DIR/99-debug.ini" > /dev/null

# MySQL client installeren
sudo apt-get update -qq
sudo apt-get install -y -qq default-mysql-client

# PHP mysqli-extensie installeren
sudo add-apt-repository -y ppa:ondrej/php
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
sudo apt-get install -y -qq php${PHP_VERSION}-mysql

# start-server beschikbaar maken als commando
printf '#!/bin/bash\nbash "%s/start-server.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/start-server

# update-template beschikbaar maken als commando
printf '#!/bin/bash\nbash "%s/update-template.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/update-template