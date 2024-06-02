#!/bin/bash

if [ -f .env ]; then
    echo "  ∟ .env file exists"
else
    echo "  ∟ Creating .env file"
    cp .env.example .env
fi

set -a
# shellcheck disable=SC1091
source .env
set +a

docker compose up -d

if [ -d vendor ]; then
    echo "  ∟ vendor directory exists"
    echo "  ∟ Running composer update"
    docker compose run --rm -w /var/www/html server composer update
else
    echo "  ∟ Running composer install"
    docker compose run --rm -w /var/www/html server composer install
fi

docker-compose run --rm db_server sh -c "mysql -h db_server -P 3306 -u $MYSQL_USER -p$MYSQL_PASS $MYSQL_DB < /var/lib/mysql/sql/db.sql"
