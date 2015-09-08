#!/bin/bash
currentDir="$(dirname "$0")"

cd $currentDir

. ./config/config.sh

cd ../

formatEcho "Install dependencies."

php ./composer.phar install

formatEcho "Update files permisions and user."

chmod -R 755 ./
chown -R www-data:www-data ./
chown -R root:root ./tools

formatEcho "Create a backup of the database before the migration."
sh ./tools/backup.sh

formatEcho "Migrate the database."
./vendor/bin/phinx migrate -e production

formatEcho "Update Apache config"
cp ./tools/config/$name.conf /etc/apache2/sites-available/$name.conf
service apache2 reload