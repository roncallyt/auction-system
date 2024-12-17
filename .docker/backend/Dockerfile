FROM php:8.3-fpm-alpine

LABEL mainteiner="thomersonroncally@outlook.com"

# Install PHP extensions
COPY --from=ghcr.io/mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Replace some initial configurations
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \
    && sed -i 's/post_max_size = 8M/post_max_size = 110M/g' /usr/local/etc/php/php.ini \
    && sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 110M/g' /usr/local/etc/php/php.ini \
    && sed -i 's/max_execution_time = 30/max_execution_time = 300/g' /usr/local/etc/php/php.ini

# Set user ID to the same ID on host machine
ARG HOST_UID
RUN adduser --disabled-password --gecos "" --uid $HOST_UID php

# Set this created user as the default
USER php

WORKDIR /var/www/backend

CMD [ "php-fpm" ]
