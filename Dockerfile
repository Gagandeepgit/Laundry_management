# # Use a Linux distribution as the base image
# FROM ubuntu:latest

# # Install necessary packages
# RUN apt-get update && apt-get -y install \
#     apache2 \
#     php \
#     libapache2-mod-php \
#     php-mysql \
#     mysql-server \
#     && rm -rf /var/lib/apt/lists/*

# # Copy your PHP project into the container
# COPY loginsystem/ /var/www/html/

# # Configure MySQL (set root password and create database)
# RUN service mysql start && mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH 'mysql_native_password' BY 'root_password';" && mysql -u root -proot_password -e "CREATE DATABASE laundry_db;"

# # Expose ports for Apache and MySQL
# EXPOSE 80 3306

# # Start Apache and MySQL
# CMD service apache2 start && service mysql start && tail -f /var/log/apache2/error.log




# Use an official PHP runtime as the base image
FROM php:7.4-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP project into the container
COPY loginsystem/ /var/www/html/

# Expose port 80 for the web server
EXPOSE 80

# Start the Apache web server (you can customize this if needed)
CMD ["apache2-foreground"]
