# Usar uma imagem oficial do PHP como base
FROM php:7.4-apache

# Instalar dependências adicionais, se necessário
RUN docker-php-ext-install mysqli pdo pdo_mysql && apt-get update && apt-get install -y nano

# Habilitar módulos do Apache, se necessário
RUN a2enmod rewrite

# Copiar o código PHP para o diretório correto no container
COPY . /var/www/html/
