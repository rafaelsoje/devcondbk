## DevCond backend

php artisan serve

```composer require tymon/jwt-auth```


php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
php artisan make:migration createalltables
php artisan migrate
