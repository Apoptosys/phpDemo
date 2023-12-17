FROM php:7.2-apache


WORKDIR /var/www/html

COPY src/ .

RUN chown -R www-data:www-data /var/www/html/your_database.db \
    && chmod 775 /var/www/html
