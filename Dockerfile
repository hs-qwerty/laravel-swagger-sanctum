FROM php:8.3-fpm

ARG user
ARG uid

#requirements
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libmagickwand-dev \
    libpng-dev \
    librabbitmq-dev \
    libzip-dev \
    pkg-config \
    ssh-client \
    vim
#cache clear
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#php extension
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets opcache intl
RUN pecl install -o -f redis amqp  && rm -rf /tmp/pear && docker-php-ext-enable amqp redis
#install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
#new user
# -m folder_control
# -d folder_path
# -G grups
# -u user_id
RUN useradd -m -d /home/$user -s /bin/bash -G www-data,root -u $uid $user
RUN mkdir -p /home/$user/.composer
#RUN chown -R $user:$user /home/$user
#copy file and permission own
COPY --chown=www-data:www-data . /var/www/html

USER root

EXPOSE 9000

CMD ["php-fpm"]
