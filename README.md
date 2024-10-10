# We Movies

## Variables environment

Create your .env file

|KEY|Value|
|:--:|:--:|
|APP_ENV|your_environment (eg: dev)|
|APP_SECRET|da7531dde9d8af5a5bca24c083dc52a8|
|DATABASE_URL|mysql://root:@db_wemovies:3306/db_symfony?serverVersion=8&charset=utf8mb4|
|BASE_URL_MOVIEDB|<https://api.themoviedb.org/3/>|
|TOKEN_MOVIEDB|your_token_movie|
|JWT_SECRET_KEY|%kernel.project_dir%/config/jwt/private.pem|
|JWT_PUBLIC_KEY|%kernel.project_dir%/config/jwt/public.pem|
|JWT_PASSPHRASE|5fa9b3369cf372ad5210d65d7b72821c9b7dcb9c20829a66b7bb6c11ec0d06f9|

## Run docker-compose

````:shell
docker-compose build
docker-compose up -d
````

## Install Composer

````:shell
docker exec -it www_wemovies composer install
````

## Create database & table

````:shell
docker exec -it www_wemovies bin/console doctrine:database:create --if-not-exists
docker exec -it www_wemovies bin/console doctrine:schema:update --force
````

## Load fixtures

````:shell
docker exec -it www_wemovies bin/console doctrine:fixtures:load --group=UserFixtures
````

## Generate SSL Key

````:shell
docker exec -it www_wemovies bin/console lexik:jwt:generate-keypair
````

## Install & build Webpack

````:shell
docker exec -it www_wemovies npm install
docker exec -it www_wemovies yarn run dev
````

## Run application

<http://localhost:8000/>
