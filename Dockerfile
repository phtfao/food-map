FROM php:7.2-apache

RUN apt-get update \
 && apt-get install -y git zlib1g-dev \
 && docker-php-ext-install zip \
 && pecl install xdebug-2.7.0 \
 && docker-php-ext-enable xdebug \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
 && mv /var/www/html /var/www/public \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer \
 && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf

WORKDIR /var/www