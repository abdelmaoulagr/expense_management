# Use the official PHP image with Apache
FROM php:8.2.13-apache

# Set a default value for uid if not provided during build
ARG uid=1000

# Update package repositories
RUN apt-get update

# Install system dependencies
RUN apt-get install -y \
    libzip-dev \
    unzip \
    git \
    zip \
    curl \
    sudo \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++\
    libonig-dev

# Set Apache to run as devuser
RUN sed -i -e 's/www-data/devuser/g' /etc/apache2/envvars
RUN chown -R devuser:devuser /var/www

# 2. apache configs + document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/expense_management/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

# 4. start with base php config, then add extensions
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
    bz2 \
    intl \
    iconv \
    bcmath \
    opcache \
    calendar \
    mbstring \
    pdo_mysql \
    zip

# 5. composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. we need a user with the same UID/GID with host user
# so when we execute CLI commands, all the host file's ownership remains intact
# otherwise command from inside container will create root-owned files and directories
### ARG uid
# Individual extension installation
RUN docker-php-ext-install bz2
RUN docker-php-ext-install intl

RUN useradd -G www-data,root -u $uid -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser

# Install Nano text editor
RUN apt-get install -y nano


