#!/bin/bash
currentDir="$(dirname "$0")"

. $currentDir/config/config.sh


formatEcho "Create base folders"

cd $dir
mkdir $name

formatEcho "Create logs and dumps folders"

cd $name
mkdir logs
mkdir dumps

formatEcho "Create databases"

mysql --password=#@Ur0undr0und5* < databases.sql

formatEcho "Init the Apache conf file and enable it"
touch /etc/apache2/sites-available/config/$name.conf

a2ensite $name

service apache2 reload

formatEcho "Don't forget to copy/paste the framework config file : cd $dir/$name/htdocs/application/config/"