FROM php:8-cli
COPY . . 
EXPOSE 7070
ENTRYPOINT php -S 0.0.0.0:7070 index.php
