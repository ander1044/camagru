FROM php:7.3.7-apache
#COPY apache2.conf /etc/apache2
RUN apt-get update && apt-get install -y software-properties-common \
libjpeg62-turbo-dev \
libpng-dev \
libfreetype6-dev \
ssmtp mailutils
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN echo "matchawebmaster@gmail.com" >> /etc/ssmtp/ssmtp.conf
RUN echo "mailhub=smtp.gmail.com:587" >> /etc/ssmtp/ssmtp.conf
RUN echo "AuthUser=matchawebmaster@gmail.com" >> /etc/ssmtp/ssmtp.conf
RUN echo "AuthPass=thisismatchapassword" >> /etc/ssmtp/ssmtp.conf
RUN echo "UseTLS=YES" >> /etc/ssmtp/ssmtp.conf
RUN echo "UseSTARTTLS=YES" >> /etc/ssmtp/ssmtp.conf
RUN echo "sendmail_path=sendmail -i -t" >> /usr/local/etc/php/conf.d/php-sendmail.ini