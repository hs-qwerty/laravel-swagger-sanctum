- Contents
```text
PHP
Laravel 10x
Docker
MySQL
Redis
Nginx
RabbitMQ
```
- Use
```text
Sanctum
Job
Listener
Event
Mail
Middleware
Service
Repository
Observer
DTO
Enum
Action class
Testing
Rate limiting
```
- installation
```yml
docker compose exec app composer install
docker compose exec app php artisan migrate:fresh --seed
```

- .env redis config
```text
CACHE_DRIVER=redis
REDIS_HOST=redis
REDIS_CLIENT=predis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

- .env rabbitmq config
```text
QUEUE_CONNECTION=rabbitmq
RABBITMQ_HOST=admin-rabbitmq
RABBITMQ_PORT=5672
RABBITMQ_USER=guest
RABBITMQ_PASSWORD=guest
RABBITMQ_VHOST=/
```
