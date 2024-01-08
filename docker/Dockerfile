ARG PHP_VERSION_SELECTED=8.2

FROM php:${PHP_VERSION_SELECTED}-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    nano \
    libmcrypt-dev \
    openssl \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    curl \
    && rm -r /var/lib/apt/lists/*

RUN a2enmod rewrite
RUN a2enmod ssl

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo_mysql \
        mysqli \
    && docker-php-ext-enable mysqli

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g n \
    && n stable

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer/composer /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
EXPOSE 443
