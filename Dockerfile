FROM php:8.2-apache

# Install PostgreSQL PDO driver (skip if using MySQL)
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Copy project files to Apache's default root
COPY . /var/www/html/

# Set Apache to serve from the /public directory
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Optional: explicitly enable index.php
RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf

FROM php:8.2-apache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
COPY . /var/www/html
RUN composer install --no-dev

# Apache config
EXPOSE 80