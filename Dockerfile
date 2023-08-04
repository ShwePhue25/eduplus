# Stage 1: Build Stage
FROM composer:2.1 as builder

# Set the working directory for the build stage
WORKDIR /app

# Copy only the necessary files for Composer
COPY composer.json composer.lock ./

# Install Composer dependencies
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-autoloader && \
    composer clear-cache

# Copy the rest of the Laravel project files to the container
COPY . .

# Generate the Composer autoload files
RUN composer dump-autoload --optimize

# Stage 2: Runtime Stage
FROM php:8.1-fpm-alpine

# Install system dependencies
RUN apk update && \
    apk add --no-cache \
        git \
        zip \
        unzip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory
WORKDIR /var/www/html

# Copy the optimized files from the build stage
COPY --from=builder /app .

# Expose port 9000 (PHP-FPM)
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
