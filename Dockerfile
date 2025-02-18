# Etapa 1: Construcción
FROM composer:latest AS composer

# Etapa 2: Aplicación Laravel
FROM php:8.3.0-apache-bullseye

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath gd

# Copiar Composer desde la etapa anterior
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el archivo php.ini para desarrollo
RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/conf.d/php.ini

# Configurar Apache para Laravel
RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Definir el directorio de trabajo
WORKDIR /var/www/html

# Copiar la aplicación Laravel
COPY . .

# Instalar las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
