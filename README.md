# Requirment
- PHP ^8.0.2
- Mysql
- composer
- node v18.11.0

## windows
Install node version can refer this doc
https://github.com/coreybutler/nvm-windows

## no docker
1. duplicate env.example -> .env
2. execute "composer install"
3. fill the env to needed (like database)
4. execute npm run dev
5. php artisan migrate:fresh --seed
6. run server with "php artisan serve"

## with docker but its only for database for now
1. duplicate .env.example -> .env
2. execute "composer install"
3. fill the env to needed (like database)
4. execute docker compose -f docker-compose_development.yml up
5. execute npm run dev
6. php artisan migrate:fresh --seed
7. run server with "php artisan serve"

## Note
contributor only
run "./vendor/bin/pint" before merge 
