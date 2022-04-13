FROM php:8.1.4-apache-buster
WORKDIR /var/www/html
# RUN mv "${PHP_INI_DIR}/php.ini-development" "${PHP_INI_DIR}/php.ini"

# Update
# RUN apt-get -y update --fix-missing && \
#     apt-get upgrade -y && \
#     apt-get --no-install-recommends install -y apt-utils && \
#     rm -rf /var/lib/apt/lists/* && \
#     apt-get -y update && \
#     apt-get -y --no-install-recommends install libzip-dev zip && \
#     rm -rf /var/lib/apt/lists/*

# Install useful tools and install important libaries
# RUN apt-get -y update && \
#     apt-get -y --no-install-recommends install nano wget \
#     dialog \
#     apt-get -y --no-install-recommends install default-mysql-client \
#     zlib1g-dev \
#     libzip-dev \
#     libicu-dev && \
#     apt-get -y --no-install-recommends install --fix-missing apt-utils \
#     build-essential \
#     libonig-dev && \ 
#     apt-get -y --no-install-recommends install --fix-missing libcurl4 \
#     libcurl4-openssl-dev \
#     zip \
#     openssl && \
#     rm -rf /var/lib/apt/lists/* && \


# Install PHP extensions
RUN apt-get -y update --fix-missing && apt-get -y install libzip-dev libicu-dev && \
    docker-php-ext-install zip && \
    docker-php-ext-install exif && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install gettext && \
    docker-php-ext-install calendar && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install -j$(nproc) intl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Xdebug
RUN pecl install xdebug-3.1.4 && \
    docker-php-ext-enable xdebug

RUN a2enmod rewrite headers && \
    mv "${PHP_INI_DIR}/php.ini-development" "${PHP_INI_DIR}/php.ini"

COPY ./www ./