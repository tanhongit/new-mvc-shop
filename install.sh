#!/bin/bash

set -a
source .env
set +a

# Check if .env file not exists
if [ ! -f .env ]; then
    cp .env.example .env
fi

docker compose up -d

docker compose run --rm -w /var/www/html server composer install
