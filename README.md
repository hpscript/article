# laravel環境構築
Laravel is a PHP web framework uses the MVC architecture
### composerインストーラ
$ curl -sS https://getcomposer.org/installer | php

### Composer Create-Project
$ php composer.phar create-project --prefer-dist laravel/laravel ${projectName}<br>
$ php artisan --version

### make:auth
$ php composer.phar require laravel/ui
$ php artisan ui vue --auth
$ php artisan migrate
$ npm install
$ npm run dev

### Cannot allocate memoryのエラーが出た時
$ sudo /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024<br>
$ sudo /sbin/mkswap /var/swap.1<br>
$ sudo /sbin/swapon /var/swap.1<br>
$ free<br>
$ php composer.phar create-project --prefer-dist laravel/laravel nomad "6.8.0"<br>
$ php artisan --version

# 初期設定
### config/app.php
```
'timezone' => 'Asia/Tokyo',
'locale' => 'ja',
'fallback_locale' => 'ja',
'faker_locale' => 'ja_JP',
```
$ php artisan tinker<br>
>>> echo Carbon\Carbon::now();<br>
>>> app(\Faker\Generator::class)->name;

### .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Class * not found
$ php composer.phar dump-autoload


### プロジェクトの複製
$ git clone https://github.com/***/***.git<br>
$ cd ***<br>
$ git branch ${issue}<br>
$ git checkout ${issue}<br>
// vendorの作成<br>
$ php composer.phar install<br>
// .envファイルの作成　※.env.exampleの複製ではなく、必要に応じてMAIL_DRIVER、AWS_ACCESS_KEY、PUSHER_APP_IDなどを記述する<br>
.env<br>
$ php artisan key:generate<br>

// mysql<br>
mysql> create database ***_dev<br>
mysql> use ***_dev<br>
// 初期テーブルの設定

$ php artisan migrate<br>
$ php composer.phar dump-autoload
