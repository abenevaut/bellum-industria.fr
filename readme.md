## Docker

```shell
$> docker-compose up -d apache2 php-fpm php-worker mysql redis blackfire
$> docker-compose exec workspace bash
$> docker-compose exec workspace composer install
$> docker-compose exec workspace php /var/www/artisan migrate
$> docker-compose exec workspace php /var/www/vendor/bin/phpunit
$> docker-compose stop
$> docker-compose rm
```
