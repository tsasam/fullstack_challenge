#!/bin/bash

sudo service postgresql start

php artisan migrate

npm ci

npm run hot &

php artisan serve --host=0.0.0.0 --port=8000