FROM php:8-cli

LABEL org.opencontainers.image.authors="javier@biomemakers.com"

#
# Install needed libraries
#
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    wget \
    git \
    vim \
    sudo

#
# PHP Extensions
#
RUN docker-php-ext-install \
    zip \
    pdo \
    pdo_pgsql 

#
# Composer
#
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#
# Node
#
RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash - && \
    apt-get install -y nodejs

#
# Postgresql
#
# https://www.postgresql.org/download/linux/debian/
RUN sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt $(lsb_release -cs)-pgdg main" > /etc/apt/sources.list.d/pgdg.list' && \
    wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add -  && \
    apt-get update && \
    apt-get -y install postgresql-12

# Configure postgresql
RUN service postgresql start && \
    sudo -u postgres psql -c "create user biome with encrypted password 'biome';" && \
    sudo -u postgres psql -c "create database biome;" && \
    sudo -u postgres psql -c "grant all privileges on database biome to biome;"

#
# Arguments for the UID and GID, to run the docker with the same host user:gropu
# 
ARG DOCKER_UID
ARG DOCKER_GID

# Create a user biome with group biome
RUN groupadd -g ${DOCKER_GID} biome && \
    useradd -r -u ${DOCKER_UID} --create-home -g biome biome && \
    # biome user can use sudo
    echo "biome ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers && \
    mkdir /app && chown biome:biome /app

#
# Use the biome user
#
USER biome
WORKDIR /app

#
# Copy all files into the app
#
COPY --chown=biome . /app

#
# Run composer (php) and npm (nodejs) to install all the vendor and node_modules 
#
RUN composer install && \
    npm ci

CMD ["./run_all_docker_services.sh"]
