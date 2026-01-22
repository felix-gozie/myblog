# 1️⃣ Base image
FROM php:8.2-apache

WORKDIR /var/www/html

# 2️⃣ Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libsqlite3-dev libzip-dev zip npm nodejs \
    && docker-php-ext-install pdo pdo_sqlite

# 3️⃣ Enable Apache mod_rewrite
RUN a2enmod rewrite

# 4️⃣ Copy project
COPY . .

# 5️⃣ Ensure /var/data exists and create SQLite DB
RUN mkdir -p /var/data \
    && touch /var/data/database.sqlite \
    && chown -R www-data:www-data /var/data

# 6️⃣ Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# 7️⃣ Build Tailwind / Vite
RUN npm install
RUN npm run build

# 8️⃣ Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# 9️⃣ Set environment variables defaults (if not set in Render)
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV APP_KEY=base64:93BlkYAmAl1eHeeWZCxRoiKm2zkmXvj7XP0N5qrGK8s=
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/data/database.sqlite

# 10️⃣ Clear cache, generate key, run migrations (first deploy)
RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan route:clear \
    && php artisan migrate --force

# 11️⃣ Expose port
EXPOSE 10000

# 12️⃣ Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
