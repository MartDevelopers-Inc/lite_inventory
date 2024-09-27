# Use the official PHP image with Apache
FROM php:8.0-apache

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# Allow .htaccess files to override Apache settings
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Add a custom MySQL configuration
COPY ./my.cnf /etc/mysql/conf.d/

# Set the working directory
WORKDIR /var/www/html

# Copy the application files into the container
COPY . /var/www/html

# Expose port 80 for web traffic
EXPOSE 80

RUN service apache2 restart
