FROM mariadb

RUN apt-get update && apt-get install -y mysql-client

COPY ./docker/db/mariadb/my.cnf /etc/mysql/conf.d/my.cnf

RUN chmod 0444 /etc/mysql/conf.d/my.cnf

EXPOSE 3306
