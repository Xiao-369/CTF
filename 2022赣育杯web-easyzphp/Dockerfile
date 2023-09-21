FROM php:5.6-apache
LABEL name="xiao"

WORKDIR /var/www/html
COPY ./src /var/www/html

ENV FLAG=flag{22f6fd712d147f3533f86435ad78abe4}

RUN mv /var/www/html/flag.sh / && \
    chmod +x /flag.sh && \
    /flag.sh

EXPOSE 80



