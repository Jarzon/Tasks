#!/bin/bash
source ./config/config.sh

formatEcho "Sending files to the prod server : $ssh_server"
rsync --delete --compress --times --recursive --verbose --copy-links --exclude-from './exclude.txt' ../* $sshuser@$sshserver:$dir/$name/htdocs/

formatEcho "Update the project."
ssh $sshuser@$sshserver "sh $dir/$name/htdocs/tools/update.sh"
