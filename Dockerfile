# 1️⃣ Use official PHP image with Apache
FROM php:8.2-apache

# 2️⃣ Set working directory inside the container
WORKDIR /var/www/html

# 3️⃣ Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    libzip-dev \
    zip \
    npm \
    nodejs \
    && docker-php-ext-install pdo pdo_sqlite

# 4️⃣ Enable Apache mod_rewrite (needed for Laravel routes)
RUN a2enmod rewrite

# 5️⃣ Copy your project files into the container
COPY . .

# 6️⃣ Install PHP dependencies via Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# 7️⃣ Install Node dependencies and build Tailwind CSS
RUN npm install
RUN npm run build

# 8️⃣ Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 9️⃣ Expose port 10000 (Render free tier expects this)
EXPOSE 10000

# 🔟 Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
