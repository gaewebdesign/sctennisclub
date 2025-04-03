
FROM php:7.4-apache

RUN apt update 
RUN apt install -y emacs


RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

# Enable rewrite module (a2enmod) disable (a2dismod)
# https://manpages.ubuntu.com/manpages/bionic/man8/a2enmod.8.html
RUN a2enmod rewrite

COPY ./src /var/www/html/
COPY ./apache2/test.txt /etc/apache2/test.txt
COPY ./apache2/apache2.conf /etc/apache2/apache2.conf
#RUN apt-get update
#RUN apt-get install -y emacs

#Files
# /mysql  - holds paypal.sql


#Instructions
# create a image
# docker build -t <fullstack> .

# run with browser at localhost:8080
# docker run -p 8080:80 <fullstack>

# exec into running Container (debug help)
# docker exec -it <dockercontainer> /bin/bash
# docker ps
# docker container prune
# docker rm -v -f $(docker ps -qa)




# run nginx with emacs
# docker run -it nginx /bin/bash
# apt-get update
# apt-get install -y emacs