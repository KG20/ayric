FROM php:8.2-apache

# 1. Install dependencies FIRST (to cache layers)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# 2. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Copy ONLY composer files first (to cache dependencies)
WORKDIR /var/www/html
COPY composer.json composer.lock ./

# 4. Install dependencies (no scripts)
RUN composer install --no-dev --no-scripts --no-interaction

# 5. Copy the rest of the app
COPY . .

# 6. Apache config
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf
EXPOSE 80