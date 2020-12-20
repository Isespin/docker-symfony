FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -yq --no-install-recommends \
    apt-utils \
    curl \
    # Instalar git
    git \
    # Instalar apache
    apache2 \
    # Instalar php 7.4
    libapache2-mod-php7.4 \
    php7.4-cli \
    php7.4-json \
    php7.4-curl \
    php7.4-fpm \
    php7.4-gd \
    php7.4-ldap \
    php7.4-mbstring \
    php7.4-mysql \
    php7.4-soap \
    php7.4-sqlite3 \
    php7.4-xml \
    php7.4-zip \
    php7.4-intl \
    php-xdebug \
    php-imagick \
    # Instalar tools
    tree \
    openssl \
    nano \
    ca-certificates \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN usermod --non-unique --uid 1000 www-data && groupmod --non-unique --gid 1000 www-data

# Instalar composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar PHP
COPY ./php/app.ini /etc/php/7.4/mods-available/
RUN phpenmod app
# Configurar apache
RUN a2enmod rewrite expires
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/servername.conf
RUN a2enconf servername
# Configurar vhost
COPY ./apache/app.conf /etc/apache2/sites-available/
RUN a2dissite 000-default
RUN a2ensite app.conf

EXPOSE 80 443

WORKDIR /var/www/html

RUN rm index.html

HEALTHCHECK --interval=5s --timeout=3s --retries=3 CMD curl -f http://localhost || exit 1

CMD apachectl -D FOREGROUND
