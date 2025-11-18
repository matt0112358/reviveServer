FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mysqli zip

# Enable Apache modules
RUN a2enmod rewrite headers expires

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Create necessary directories and set permissions
RUN mkdir -p var var/cache var/plugins var/templates_compiled \
    && chmod -R 777 var \
    && chmod -R 755 www \
    && chown -R www-data:www-data /var/www/html

# Update Apache configuration for Revive Adserver
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/revive.conf \
    && a2enconf revive \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Configure PHP settings
RUN echo "file_uploads = On\n\
memory_limit = 256M\n\
upload_max_filesize = 100M\n\
post_max_size = 100M\n\
max_execution_time = 600" > /usr/local/etc/php/conf.d/uploads.ini

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
