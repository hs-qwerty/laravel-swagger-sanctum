## Installation
```bash
docker compose up -d --build 
docker compose exec app bash
chmod -R 777 /var/www/html/storage/ /var/www/html/bootstrap/
cp .env.example .env
composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate:fresh --seed
```
## Contents
```text
laravel
mysql
sanctum
swagger
Docker
Composer
Nginx
```
## Usage
```text
laravel-example.postman_collection.json
```

