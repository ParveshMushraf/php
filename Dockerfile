FROM php:7.2-apache

#Install musqli
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html/

COPY . /var/www/html/


# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set environment variables for RDS connection
ENV DB_HOST your-rds-endpoint
ENV DB_PORT 3306
ENV DB_USER your-db-username
ENV DB_PASS your-db-password
ENV DB_NAME your-db-name

# Enable Apache modules and configure PHP
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN echo "date.timezone = 'America/New_York'" >> /usr/local/etc/php/php.ini

# Copy your PHP application files to the container
COPY . /var/www/html/

# Expose port 80 for Apache
EXPOSE 80

# Start Apache web server
CMD ["apache2-foreground"]
