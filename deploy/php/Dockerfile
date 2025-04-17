FROM php:8.4-fpm-alpine AS php
ARG WWWUSER=1000
ARG WWWGROUP=1000
RUN set -eux; \
    addgroup -g ${WWWGROUP} app; \
    adduser -D -u ${WWWUSER} -G app app; \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS icu-dev libzip-dev postgresql-dev; \
    apk add --no-cache linux-headers bash libzip icu-libs icu-data-full libjpeg-turbo-dev libpng-dev libwebp-dev freetype-dev libmcrypt; \
    docker-php-ext-configure gd --enable-gd; \
    docker-php-ext-install -j"$(nproc)" pdo pdo_pgsql zip sockets opcache gd intl exif pcntl; \
    pecl install redis; \
    docker-php-ext-enable redis pcntl; \
    apk del .build-deps; \
    apk add --no-cache libpq; \
    mkdir -p /var/www/app && chown -R app:app /var/www/app
RUN echo "upload_max_filesize=30M" > /usr/local/etc/php/php.ini-production && echo "post_max_size=30M" >> /usr/local/etc/php/php.ini-production
WORKDIR /var/www/app
COPY --from=composer/composer:2 /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
USER app:app

FROM php AS prod
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
COPY --chown=app:app composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --optimize-autoloader
COPY --chown=app:app . .
EXPOSE 9000
CMD ["php-fpm"]

FROM php AS dev
EXPOSE 80

FROM dev AS xdebug
RUN set -eux; apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS; pecl install xdebug; docker-php-ext-enable xdebug; apk del .phpize-deps
