#!/bin/bash

set -a
source .env
set +a

if [ -f .env ]; then
    echo "  ∟ .env file exists"
else
    echo "  ∟ Creating .env file"
    cp .env.example .env
fi

docker compose up -d

if [ -d vendor ]; then
    echo "  ∟ vendor directory exists"
    echo "  ∟ Running composer update"
    docker compose run --rm -w /var/www/html server composer update
else
    echo "  ∟ Running composer install"
    docker compose run --rm -w /var/www/html server composer install
fi
