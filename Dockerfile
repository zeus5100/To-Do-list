FROM laravelsail/php82-composer

RUN apt-get update && apt-get install -y supervisor

RUN docker-php-ext-install pdo_mysql

COPY supervisord.conf /etc/supervisor/supervisord.conf

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]