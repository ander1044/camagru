FROM php:7.3.7-apache
#COPY apache2.conf /etc/apache2
RUN apt-get update && apt-get install -y software-properties-common \
libjpeg62-turbo-dev \
libpng-dev \
libfreetype6-dev \
msmtp mailutils
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY msmtprc /etc/msmtprc
COPY php.ini /usr/local/etc/php/conf.d/php.ini
RUN chmod 600 /etc/msmtprc
RUN chown www-data:www-data /etc/msmtprc
ARG SMTP_PASSWORD=thisismatchapassword
RUN sed -i "s|thisismatchapassword|$SMTP_PASSWORD|g" /etc/msmtprc
RUN echo "sendmail_path=/usr/bin/msmtp -t" >> /usr/local/etc/php/conf.d/php-sendmail.ini