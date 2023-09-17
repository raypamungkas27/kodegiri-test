<h1 align="center">
Kodegiri 2023
</h1>


- |<h3>Feature  </h3>                |       Description                                                                 |
  |----------------------------------|-----------------------------------------------------------------------------------|
  |<b>login                          | </b>User can login in web                                                         |
  |<b>register                       | </b>User can register in Web                                                      |
  |<b>my-profile                     | </b>User can show profile                                                         |
  |<b>edit my-profile                | </b>User can edit profile                                                         |
  |<b>list,view,edit,delete document | </b>user CRUD document                                                            |
  |<b>send email-document            | </b>User can send-email document                                                  |



## Requirements

        "php": "^8.1",
        "guzzlehttp/guzzle": "^7.2",
        "laravel/framework": "^10.10",
        "laravel/sanctum": "^3.2",
        "laravel/tinker": "^2.8",
        "kris/laravel-form-builder": "^1.52",
        "realrashid/sweet-alert": "^7.1",
        "tymon/jwt-auth": "*",
        "yajra/laravel-datatables": "^10.1"

## Install

Clone repo

```
git clone https://github.com/raypamungkas27/kodegiri-test.git
```

Install Composer


[Download Composer](https://getcomposer.org/download/)


composer update/install 

```
composer install
```


## Setting ENV

```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5433
DB_DATABASE=kodegiri_test
DB_USERNAME=postgres
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=3e9e3faa4460d2
MAIL_PASSWORD=**********
```

Run the migration

```
php artisan migrate
```

Run unit test

```
php artisan test
```

Run seed

```
php artisan db:seed --class=UsersTableSeeder  
```

Generate a New Application Key

```
php artisan key:generate
```

Create a symbolic link

```
php artisan storage:link
```

## API Docs

</br>
<p style="font-weight: bold;">
Complete REST API Documentation can be found <a href="https://documenter.getpostman.com/view/11653331/2s9YC7TC3e">here</a>
</p>


## License

> Copyright (C) 2023 Ray Nanda Pamungkas.  

