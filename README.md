## Install
 ```bash
 git clone https://github.com/rdg-dev/meniny.git
 ```
 - run command in root directory: 
   ```bash
   composer install
   ```
 - Rename file .env.example to .env in root directory and set db values
 - Create table namedays: 
   ```bash
   php artisan migrate
   ```
 - insert records to table: 
   ```bash
   php artisan name-days:update
   ```
   
