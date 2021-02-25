# laravel環境構築
Laravel is a PHP web framework uses the MVC architecture
### composerインストーラ
$ curl -sS https://getcomposer.org/installer | php

### laravel8 update
$ php artisan serve --host 192.168.33.10 --port 8000

jetstream install<br>
$ php composer.phar require laravel/jetstream<br>
$ sudo mv composer.phar /usr/local/bin/composer<br>
$ php artisan jetstream:install livewire<br>
$ php artisan migrate

$ sudo npm install -g n<br>
$ sudo n stable<br>
$ node -v<br>
v14.15.0<br>
$ npm run dev

$ php artisan serve –host 192.168.33.10 –port 8000

### Composer Create-Project
$ php composer.phar create-project --prefer-dist laravel/laravel ${projectName}<br>
$ php artisan --version

### make:auth
$ php composer.phar require laravel/ui<br>
$ php artisan ui vue --auth<br>
$ php artisan migrate<br>
$ npm install<br>
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


# Laravel8.x環境構築手順
### 1.vagrant initからsshログインまで
$ mkdir amazonlinux2<br>
$ cd amazonlinux2<br>
$ vagrant init gbailey/amzn2<br>
$ vi vagrantfile<br>
// 35行目ポートフォワーディング解除
```
config.vm.network "private_network", ip: "192.168.33.10"
```
$ vagrant up<br>
$ vagrant ssh-config --host 192.168.33.10<br>
$ vagrant ssh<br>
// sshログイン後<br>
$ cat /etc/*release<br>
$ sudo yum update

### 2.Gitインストール(2.29.2)
$ sudo yum -y install gcc curl-devel expat-devel gettext-devel openssl-devel zlib-devel perl-ExtUtils-MakeMaker autoconf<br>
// ダウンロード対象を確認(https://mirrors.edge.kernel.org/pub/software/scm/git/) <br>
// 11月3日時点で最新のgit2.29.2を入れる<br>
$ cd /usr/local/src/<br>
$ sudo wget https://mirrors.edge.kernel.org/pub/software/scm/git/git-2.29.2.tar.gz  <br>
$ sudo tar xzvf git-2.29.2.tar.gz<br>
$ sudo rm -rf git-2.29.2.tar.gz<br>
$ cd git-2.29.2<br>
$ sudo make prefix=/usr/local all<br>
$ sudo make prefix=/usr/local install<br>
$ git --version<br>
git version 2.29.2

### 3.Node.jsインストール(v11.15.0)
// 11系を入れる<br>
$ curl --silent --location https://rpm.nodesource.com/setup_11.x | sudo bash -<br>
$ yum install -y gcc-c++ make<br>
$ sudo yum install -y nodejs<br>
$ node --version<br>
$ npm --version

### 4.Apacheインストール(Apache/2.4.46)
$ sudo yum install httpd<br>
$ sudo systemctl start httpd<br>
$ sudo systemctl status httpd<br>
$ sudo systemctl enable httpd<br>
$ sudo systemctl is-enabled httpd<br>
$ httpd -v

### 5.PHP7.4インストール ※laravel8.xはPHP >= 7.3
$ amazon-linux-extras<br>
$ amazon-linux-extras info php7.4<br>
$ sudo amazon-linux-extras install php7.4<br>
$ yum list php* | grep amzn2extra-php7.4<br>
$ sudo yum install php-cli php-pdo php-fpm php-json php-mysqlnd php-mbstring php-xml<br>
$ php -v<br>
PHP 7.4.11 (cli) (built: Oct 21 2020 19:12:26) ( NTS )

### 6.MySQL(8.0.22)
$ sudo yum install https://dev.mysql.com/get/mysql80-community-release-el7-3.noarch.rpm<br>
$ sudo yum install --enablerepo=mysql80-community mysql-community-server<br>
$ sudo systemctl start mysqld<br>
// パスワード変更<br>
$ sudo cat /var/log/mysqld.log | grep "temporary password"<br>
$ mysql -u root -p<br>
mysql> ALTER USER 'root'@'localhost' IDENTIFIED BY '${temporary password}';<br>
mysql> SET GLOBAL validate_password.length=6;<br>
mysql> SET GLOBAL validate_password.policy=LOW;<br>
mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '${new password}';<br>
$ sudo systemctl enable mysqld<br>
$ mysql -u root -p

### 7.Ansible(2.9.13)
$ sudo amazon-linux-extras install ansible2<br>
$ ansible --version

### 8.Ruby(2.7.2)
$ git clone https://github.com/sstephenson/rbenv.git ~/.rbenv<br>
$ git clone https://github.com/sstephenson/ruby-build.git ~/.rbenv/plugins/ruby-build<br>
$ echo 'export PATH="$HOME/.rbenv/bin:$PATH"' >> ~/.bash_profile<br>
$ echo 'eval "$(rbenv init -)"' >> ~/.bash_profile<br>
$ source ~/.bash_profile<br>
// rbenvは時間がかかるので注意　痺れを切らさず待ちます<br>
$ rbenv install 2.7.2<br>
$ rbenv rehash<br>
$ sudo yum install rubygems<br>
$ gem update –system 2.7.2

### 9.AmazonLinux2 timezone変更
$ date<br>
$ cat /etc/localtime<br>
$ sudo vi /etc/sysconfig/clock
```
ZONE="Asia/Tokyo" 
UTC=false
```
$ sudo cp /etc/sysconfig/clock /etc/sysconfig/clock.org<br>
$ strings /etc/localtime<br>
$ date

### プロジェクト作成
$ composer create-project --prefer-dist laravel/laravel nonemail<br>
$ cd nonemail<br>
$ composer require laravel/jetstream<br>
$ php artisan jetstream:install livewire<br>
mysql> create database nonemail;<br>
.env
```
DB_DATABASE=nonemail
```
$ php artisan migrate<br>
$ npm install && npm run dev

config/fortify.php
```
'username' => 'name',
```
resources/views/auth/login.blade.php
```
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name')" required autofocus />
            </div>
```

$ php artisan serve --host 192.168.33.10 --port 8000<br>
// 動作確認

$ php artisan make:migration change_users_table_column_email_nullable  --table=users<br>
2020_11_20_024033_change_users_table_column_email_nullable.php
```
public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropUnique('users_email_unique');
            $table->string('name')->unique()->change();
            $table->string('email')->nullable()->change();
        });
    }
```
$ composer require doctrine/dbal<br>
$ php artisan migrate<br>
mysql> describe users;




app/Actions/Fortify/CreateNewUser.php<br>
 L nameを'required', 'unique:users'にする<br>
 L emailから'required'を削除し、'nullable'を追加
```
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
```

### tinkerで入れる場合
php artisan tinker<br>
$user = new App\Models\User();<br>
$user->password = Hash::make('password');<br>
$user->name = 'yamada';<br>
$user->save();

### sql文で入れる場合
passwordをhash化する
```
$hashedpassword = password_hash('fugagua', PASSWORD_DEFAULT);
```

hash化したパスワードをインサート<br>
INSERT INTO users (name, password, created_at, updated_at) VALUES ("ito", "$2y$10$1Wix04F*********", "2020-11-20 03:23:47", "2020-11-20 03:23:47");
