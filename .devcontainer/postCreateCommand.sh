#!/bin/bash

# Configure git settings
git config pull.rebase false # needs to be configured before first pull or merge to prevent error
git config merge.ours.driver true # configure git to use 'ours' merge strategy by default, this is not very git-like, but makes it easier voor studenten
git config --global merge.conflictStyle diff3 # show source between ours and theirs in merge conflicts

# PHP foutmeldingen tonen in de browser (handig tijdens ontwikkeling)
PHP_INI_DIR=$(php --ini | grep "Scan for" | awk -F': ' '{print $2}')
echo "display_errors = On
display_startup_errors = On
error_reporting = E_ALL" | sudo tee "$PHP_INI_DIR/99-debug.ini" > /dev/null

# MySQL-commando en PHP mysqli-extensie installeren
sudo apt-get update -qq
sudo apt-get install -y -qq default-mysql-client php-mysql

# start-server en update-template beschikbaar maken als commando
printf '#!/bin/bash\nbash "%s/start-server.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/start-server
printf '#!/bin/bash\nbash "%s/update-template.sh"\n' "$(pwd)" \
    | sudo install -m 755 /dev/stdin /usr/local/bin/update-template