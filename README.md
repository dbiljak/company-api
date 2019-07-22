## Company api

1. git clone
2. cd to folder
3. composer install
4. create database company-api
5. set .env file
  * DB_DATABASE=company_api
  * DB_USERNAME=root
  * DB_PASSWORD=
6. php artisan key:generate
7. php artisan migrate
8. php artisan db:seed
9. php artisan passport:install
10. php artisan passport:client --personal
11. php artisan serve
12. import to "Postman" from url
