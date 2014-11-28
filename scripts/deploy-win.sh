#!/bin/bash
BUILD_PATH=e:\\builds\\;
DIRECTORY=e:\\sites\\;
SITE_NAME="html-site";

if [ $# -ne 1 ]
	then
	echo "Usage: `basename $0` {build-number}";
	exit;
fi

cp ${BUILD_PATH}build-$1.tar ${DIRECTORY}build-$1.tar
if [ -s ${DIRECTORY}build-$1.tar ]
	then
	for (( i=5; i>0; i--)); do
		sleep 1 &
		clear
		printf "Deploying in $i Seconds"
		wait
	done

	cd ${DIRECTORY}
	found=`find -type d -name "${SITE_NAME}"`
	if [ -n "$found" ];
		then
		printf "\nCreating backup before deploy";
		cp  -ar "${SITE_NAME}" build-$1-backup;
		printf "\nRemoving old site"
		rm -rf  ${SITE_NAME}
	fi
	printf "\nDeploying new version of site"
	tar -C ${DIRECTORY} -xvf build-$1.tar;
	printf "\nDeployed Build $1";
else
	printf "Build $1 not Found in build dir";
fi
rm -rf build-$1.tar;
