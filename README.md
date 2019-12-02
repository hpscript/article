# laravel環境構築
### composerインストーラ
$ curl -sS https://getcomposer.org/installer | php

### Composer Create-Project
$ php composer.phar create-project --prefer-dist laravel/laravel nomad "5.8.*"<br>
$ php artisan --version

### Cannot allocate memoryのエラーが出た時
$ sudo /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024<br>
$ sudo /sbin/mkswap /var/swap.1<br>
$ sudo /sbin/swapon /var/swap.1<br>
$ free<br>
$ php composer.phar create-project --prefer-dist laravel/laravel nomad "5.8.*"<br>
$ php artisan --version

# 初期設定
### app/config.php
'timezon' => 'timezone' => 'Asia/Tokyo',<br>
UTCからAisa/Tokyoに変更<br>

'locale' => 'ja',<br>
localをenからjaに変更
