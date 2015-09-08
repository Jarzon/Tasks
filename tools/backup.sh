#!/bin/bash
currentDir="$(dirname "$0")"

. $currentDir/config/config.sh

mysqldump -u root --password=$password $name > /tmp/$name.sql
rsync --compress --times /tmp/$name.sql $dir/$name/dumps/dl-$(date +%Y%m%d%T).sql