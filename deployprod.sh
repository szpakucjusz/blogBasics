git pull origin master
docker run --rm -v $(pwd):/app composer install --optimize-autoloader
docker exec -it app-recrutation-blog php artisan migrate && docker exec -it app-recrutation-blog php artisan config:cache && docker exec -it app-recrutation-blog php artisan route:cache
docker run --rm -v $(pwd):/app composer dump-autoload
# error - Action Facade\Ignition\Http\Controllers\ExecuteSolutionController not defined
php artisan route:clear
docker run --rm -v $(pwd):/app composer dump-autoload -o
