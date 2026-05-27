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
