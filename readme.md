## Docker

```shell
$> docker-compose --project-name bellumindustria up -d apache2 php-fpm php-worker mysql redis blackfire
$> docker-compose --project-name bellumindustria exec workspace bash
$> docker-compose --project-name bellumindustria exec workspace composer install
$> docker-compose --project-name bellumindustria exec workspace php /var/www/artisan migrate
$> docker-compose --project-name bellumindustria exec workspace php /var/www/vendor/bin/phpunit
$> docker-compose --project-name bellumindustria stop
$> docker-compose --project-name bellumindustria rm
$> docker-compose --project-name bellumindustria rm -f
```
