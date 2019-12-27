# laravel環境構築
Laravel is a PHP web framework uses the MVC architecture
### composerインストーラ
$ curl -sS https://getcomposer.org/installer | php

### Composer Create-Project
$ php composer.phar create-project --prefer-dist laravel/laravel nomad "6.8.0"<br>
$ php artisan --version

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
DB_PASSWORD=password
```

### Class * not found
$ php composer.phar dump-autoload
