# Dockerfile per PHP con Apache e Python
FROM php:8.1-apache

# Installa SQLite e le estensioni PHP necessarie
RUN apt-get update && apt-get install -y sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Copia i file del progetto nella directory di Apache
COPY ./a.html /var/www/html/index.html

# Espone la porta 80 per PHP/Apache
EXPOSE 80

# Comando per avviare Apache e il server Python
RUN service apache2 start
