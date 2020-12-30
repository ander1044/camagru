FROM php:7.0-apache
#COPY apache2.conf /etc/apache2
#RUN add-apt-repository ppa:ondrej/php \
#apt update && apt upgrade \
#apt-get install php7.2-gd \

#RUN apt-get update && apt-get install -y software-properties-common && \
#add-apt-repository ppa:ondrej/php && add-apt-repository ppa:ondrej/php-qa && apt-get update && \
#apt-get -y install apt-transport-https lsb-release ca-certificates curl && \
#curl -sSL -o /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && \
#sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list' && \
#apt-get update && \
#apt policy && \
#apt-cache search php7-* && \
#apt-get install php-gd 
RUN docker-php-ext-install mysqli pdo pdo_mysql