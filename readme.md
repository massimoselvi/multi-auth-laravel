## Laravel (5.6) - Multi Auth Guard Demo ##

### Purpose ###

quick demo of an implementation of multi user tables authentication.

### Quick start ###

clone this repo then 

    cd multi-auth-laravel
 
    composer install

    cp .env.example .env

    php artisan key:generate

#### Set up database ####
    touch database/database.sqlite

    php artisan migrate --seed