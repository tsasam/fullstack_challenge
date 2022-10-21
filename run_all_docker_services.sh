#!/bin/bash

sudo service postgresql start

composer install

composer update

php artisan migrate

php artisan db:seed

npm ci

npm run hot &

php artisan serve --host=0.0.0.0 --port=8000
