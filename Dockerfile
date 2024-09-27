# Use the official PHP image with Apache
FROM php:8.1-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP app into the container
COPY . /var/www/html

# Install necessary PHP extensions (including MySQL)
RUN docker-php-ext-install pdo pdo_mysql mysqli


# Expose port 80 for web traffic
EXPOSE 80

# Install required Apache modules
RUN a2enmod rewrite

# Set AllowOverride to All in the Apache config
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

