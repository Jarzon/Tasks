#!/bin/bash
sshserver="masterj.net"
sshuser="root"
password="#@Ur0undr0und5*"
name="tasks"
dir="/var/www"

formatEcho () {
	if [ -z "$1" ]
	then
		echo "";
	else
		printf "\n-----------------------------------------------------------------\n|                                                               |\n|  %-60s |\n|                                                               |\n-----------------------------------------------------------------\n" "$1";
	fi

   return 0
}