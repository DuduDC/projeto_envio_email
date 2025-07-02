FROM php:8.2-cli

WORKDIR /app

# Instala dependências e Composer
RUN apt-get update && apt-get install -y unzip git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
