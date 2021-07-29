# Mini CRM-App (Laravel) 

A mini CRM app using Laravel as an Full Stack framework.

## Requirements

This project requires PHP 7.3+, a MySQL database, [Composer](https://getcomposer.org/)

You can use [XAMPP](https://www.apachefriends.org/index.html) for PHP and MySql database if you want.

## Installation

Installing composer dependencies :

```sh
composer install
```

Copy and rename .env.example to .env, and update the environmental variables such as database, mail, etc :

```sh
cp .env.example .env
```

Generate Laravel key :

```sh
php artisan key:generate
```

Create the symbolic link, To make stored image file(companies logo) accessible from the web :

```sh
php artisan storage:link
```

Run Laravel migration and seed(with dummy data) :

```sh
php artisan migrate:fresh --seed
```

Serve laravel:

```sh
php artisan serve
```
The app will be available on [http://127.0.0.1:8000](http://127.0.0.1:8000/)

Email : admin@admin.com

Password : password

## Test app

```sh
php artisan test
```

## Usage example

CRUD Company, CRUD Employee, SSR DataTables, Mail, Multi Language Project

## Contributing

1. Fork it (<https://github.com/yourname/yourproject/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request
