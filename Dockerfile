FROM php:8.2-apache

# If you're using PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Copy your project files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/public

# Ensure index.php is served
RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf
