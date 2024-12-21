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
    unzip
#cache clear
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#php extension
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
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
