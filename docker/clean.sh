
docker-compose down
docker purge $(docker ps -aq)
docker image rm  -f dockerhub-hubbie dockerhub-db phpmyadmin