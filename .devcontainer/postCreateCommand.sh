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

# MySQL server + PHP mysqli-extensie installeren
sudo apt-get update -qq
sudo apt-get install -y -qq mysql-server php-mysql

# voeg user toe aan mysql usergroep, zodat sockets gebruikt kunnen worden om wachtwoordloos in te loggen.
sudo usermod -aG mysql $USER

# start-server en update-template beschikbaar maken als commando
chmod +x start-server.sh
sudo ln -sf "$(pwd)/start-server.sh" /usr/local/bin/start-server
chmod +x update-template.sh
sudo ln -sf "$(pwd)/update-template.sh" /usr/local/bin/update-template