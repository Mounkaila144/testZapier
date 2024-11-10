# Dockerfile.composer

FROM php:8.1-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev

# Configuration des extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip calendar

# Installation de Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

# Variables d'environnement pour Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME=/composer
ENV PATH=$PATH:/composer/vendor/bin

# Configuration globale de Composer
RUN composer config --global process-timeout 3600 \
    && composer global require "laravel/installer"

# Copier les fichiers dans l'image
COPY . /var/www

# Installer les dépendances PHP via Composer
RUN composer install

# Changer les permissions des fichiers
RUN chown -R www-data:www-data /var/www \
    && chmod -R 777 /var/www/storage

EXPOSE 9000
CMD ["php-fpm"]
