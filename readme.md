# VDH ☕️

VDH is a simple Single Page Application built with Laravel 5.8 and Vue2.

`VDH` allows users create accounts, create credential posts with multiple images upload feature, View Users, credentaisl, image list content.

### Features

> - Login
> - Register
> - Multiple Image upload
> - Create credential Post
> - View Users, credentaisl, image list

### Installation

> Edit .env file

Update .env file with DB information

```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=multi_upload
  DB_USERNAME=root
  DB_PASSWORD=grimesBottom
```

> Install laravel packages

Remove composer.lock file and install packages

```bash
rm composer.lock
```

```bash
composer install
```


> Generate Key

Generate application key from your terminal

```bash
php artisan key:generate
```



> Install npm packages

Remove package-lock.json file and install npm packages

```bash
rm package-lock.json
```

```bash
npm i
```

> Run Migrations

Run database migrations and seed the post tables

```bash
php artisan migrate:fresh --seed
```

> Start Application

```bash
php artisan serve
```

> Go to localhost:8000 and register, start blogging 🎉
