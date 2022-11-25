FROM php:7.2-apache
COPY src/ /var/www/html/

RUN apt-get update && apt-get install -y cron

COPY servicetests-cron /etc/cron.d/servicetests-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/servicetests-cron 

# Apply cron job
RUN crontab /etc/cron.d/servicetests-cron

RUN touch /var/log/cron.log

CMD ( cron -f -l 8 & ) && apache2-foreground # <-- run cron








