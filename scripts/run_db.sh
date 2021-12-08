#!/bin/bash

function getContainerHealth {
  docker inspect --format "{{.State.Health.Status}}" $1
}

docker run -p 3306:3306 \
	-d \
	-e MYSQL_DATABASE=test \
	-e MYSQL_USER=test \
	-e MYSQL_PASSWORD=secret \
	-e MYSQL_ROOT_PASSWORD=secret \
	--name mysql \
	--health-cmd='mysqladmin ping --silent' \
	mysql:5.6

while STATUS=$(getContainerHealth mysql); [ $STATUS != "healthy" ]; do 
	if [ $STATUS == "unhealthy" ]; then
		echo "Failed!"
		exit -1
	fi
	printf .
	lf=$'\n'
	sleep 1
done
