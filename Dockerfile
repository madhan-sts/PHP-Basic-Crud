# syntax=docker/dockerfile:1
FROM php:8.1-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
