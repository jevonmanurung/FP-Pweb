## About this project

This application is built using :

<ul>
    <li><a href="https://laravel.com/" target="_blank">Laravel 11</a> (featuring <a href="https://vitejs.dev/" target="_blank">Vite</a>)</li>
    <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap 5.3</a></li>
    <li><a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons 1.11.3</a></li>
</ul>

It is just a fresh <b>Laravel 11</b> installation with integrated <b>Bootstrap 5</b> and <b>Bootstrap Icons</b>.<br/>
You can use this as a starting point to create your own Bootstrap 5 based Laravel applications.

## How To Use

1. Clone github repo
2. Install composer dependencies
   ```
   composer install
   ```
3. install NPM dependencies
   ```
   npm install
   ```
4. Create copy of .env file
   ```
   cp .env.example .env
   ```
5. Generate app encryption key
   ```
   php artisan key:generate

   ```
6. Database migration
   ```
   php artisan migrate:fresh
   ```
7. Run npm and php artisan
   ```
   npm run dev
   ```
   ```
   php artisan serve
   ```