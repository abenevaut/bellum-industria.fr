[![build status](https://gitlab.com/bellum-industria/www/badges/master/build.svg)](https://gitlab.com/bellum-industria/www/commits/master)

## Docker

```shell
$> docker network create -d bridge bellumindustria_lan
$> docker-compose --project-name bellumindustria up -d apache2 php-fpm php-worker mysql redis blackfire mailhog
$> docker-compose --project-name bellumindustria exec workspace bash
$> docker-compose --project-name bellumindustria exec workspace composer install
$> docker-compose --project-name bellumindustria exec workspace php /var/www/artisan migrate
$> docker-compose --project-name bellumindustria exec workspace php /var/www/vendor/bin/phpunit
$> docker-compose --project-name bellumindustria stop
$> docker-compose --project-name bellumindustria rm
$> docker-compose --project-name bellumindustria rm -f
```

```shell
$> docker network create -d bridge cibellumindustria_lan
```