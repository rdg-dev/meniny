## Install
 ```bash
 git clone https://github.com/rdg-dev/meniny.git
 ```
 - run command in root directory: 
   ```bash
   composer install
   ```
 - Rename file .env.example to .env in root directory and set db values
   ```bash
   ...
   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_PORT=3306
   DB_DATABASE=*** db-name ***
   DB_USERNAME=*** db-user ***
   DB_PASSWORD=*** db-password ***
   ...
   ```
 - Create table namedays: 
   ```bash
   php artisan migrate
   ```
 - insert records to table: 
   ```bash
   php artisan name-days:update
   ```
 - Run php server
   ```bash
   php artisan serve
   ```
