
## Documentation

Please follow below steps to setup the laravel environment.

##### Clone the Github Repository.

```
git clone git@github.com:adheesha23/Anagram.git
```

Copy contents from file .env.example to .env and set APP_URL=http://0.0.0.0:8000


##### Run docker compose to build the docker containers

```
docker-compose up --build
```

Connect to the app_1 container and run the following.

```
docker exec -ti app_1 /bin/bash 
```

Initialize Laravel's encryption key

```
php artisan key:generate
```

Install php packages with Composer

```
composer install
```

Now you should be able to point your browser to http://0.0.0.0:8000
