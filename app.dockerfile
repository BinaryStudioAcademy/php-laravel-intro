FROM php:8.1-fpm-alpine

ARG UID=82
ARG GID=82
ENV USERNAME=www-data
ENV HOME=/var/www

RUN apk update \
    mysql-client \
    && docker-php-ext-install pdo_mysql \
    && apk add --no-cache $PHPIZE_DEPS \
    && export PHP_IDE_CONFIG="serverName=LARAVEL"

RUN apk add --no-cache \
          freetype \
          libjpeg-turbo \
          libpng \
          freetype-dev \
          libjpeg-turbo-dev \
          libpng-dev \
  && docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
      && docker-php-ext-install -j$(nproc) gd \
      && docker-php-ext-enable gd \
      && apk del --no-cache \
        freetype-dev \
        libjpeg-turbo-dev \
        libpng-dev \
      && rm -rf /tmp/*

COPY --from=composer:2.1.14 /usr/bin/composer /usr/bin/composer
COPY --chown=$USERNAME:$USERNAME scripts/change_user_id.sh /change_user_id.sh

RUN chmod +x /change_user_id.sh\
    && /change_user_id.sh $USERNAME $UID $GID

USER $USERNAME
