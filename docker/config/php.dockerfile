FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    g++ \
    git \
    libicu-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    unzip \
    curl \
    libjpeg62-turbo-dev \
    libfreetype6-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD . /var/www/html/

RUN mkdir -p /var/www/html/storage/
RUN chmod 777 storage/ -R

EXPOSE 9000

CMD php artisan migrate && php-fpm
