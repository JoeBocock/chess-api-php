FROM php:8.1-cli-alpine

RUN apk add --no-cache bash

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

COPY . /app

WORKDIR /app
