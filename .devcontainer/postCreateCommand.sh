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

# PHP mysqli-extensie en MySQL client installeren
sudo apt-get update -qq
sudo apt-get install -y -qq php-mysql default-mysql-client

# start-server beschikbaar maken als commando
printf '#!/bin/bash\nbash "%s/start-server.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/start-server

# update-template beschikbaar maken als commando
printf '#!/bin/bash\nbash "%s/update-template.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/update-template