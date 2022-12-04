## Requirment
- PHP ^8.0.2
- Mysql

# no docker
1. duplicate .env.example -> .env
2. fill the env to needed (like database)
3. execute npm run dev
4. php artisan migrate:fresh --seed
5. run server with "php artisan serve"

# with docker but its only for database for now
1. duplicate .env.example -> .env
2. fill the env to needed (like database)
3. execute docker compose -f docker-compose_development.yml up
4. execute npm run dev
5. php artisan migrate:fresh --seed
6. run server with "php artisan serve"
