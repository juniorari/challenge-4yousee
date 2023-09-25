FROM yiisoftware/yii2-php:5.6-apache
#FROM php:5.6-apache
#RUN apt-get update \
#  && apt-get install -y zlib1g-dev libicu-dev g++ \
#  && docker-php-ext-configure intl \
#  && docker-php-ext-install intl

RUN apt-get update && apt-get install -y \
libfreetype6-dev \
libjpeg62-turbo-dev \
libmcrypt-dev \
libicu-dev \
libxml2-dev \
vim \
wget \
unzip \
git \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl \
&& docker-php-ext-install -j$(nproc) iconv intl xml soap mcrypt opcache pdo pdo_mysql mysqli mbstring \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd


RUN docker-php-ext-install mysqli
RUN docker-php-ext-install sockets
RUN docker-php-ext-install pdo_mysql
#RUN docker-php-ext-install curl
#RUN docker-php-ext-install gettext
#RUN docker-php-ext-install iconv
#RUN docker-php-ext-install interbase

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
#RUN docker-php-ext-install gd
#RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ 

RUN apt install ghostscript -y

RUN a2enmod rewrite

#FROM yiisoftware/yii2-php:5.6-apache
#RUN sed -i -e 's|/app/web|/app/backend/web|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i -e 's|/app/web|/var/www/html|g' /etc/apache2/sites-available/000-default.conf

#RUN echo "<?php phpinfo(); " >> phpinfo.php
#RUN apt update \
#    apt install nano

#RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Change document root for Apache
