# MediaCube

## Разворачивание проекта
docker-compose up -d

docker exec -it mediacube-api-php-fpm composer install

создать файл .env и прописать путь к базе

docker exec -it mediacube-api-php-fpm php artisan key:generate

docker exec -it mediacube-api-php-fpm php artisan migrate

## Что сделано
все что указано в тз

## Что можно улучшить
добавить JsonResource для всех response
