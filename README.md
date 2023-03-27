# bussiness01 project
```
http://bussiness01.test/admin
Username/Password: admin@bussiness01.dev/ChangeNextTime123@

http://bussiness01.test/
```

### Installation
#### 1. Docker
Pull laradock folder as below:
```sh
- projects
    -- laradock
    -- bussiness_01
```

```sh
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
```
Open .env file and set the following:
```sh
vi .env
```
Edit content as below:
```sh
PHP_VERSION=8.0
WORKSPACE_INSTALL_NODE=true
WORKSPACE_INSTALL_YARN=true
WORKSPACE_INSTALL_IMAGE_OPTIMIZERS=true
WORKSPACE_INSTALL_IMAGEMAGICK=true
WORKSPACE_INSTALL_MYSQL_CLIENT=true
WORKSPACE_TIMEZONE=Asia/Tokyo

PHP_FPM_INSTALL_MYSQLI=true
PHP_FPM_INSTALL_IMAGEMAGICK=true
PHP_FPM_INSTALL_IMAGE_OPTIMIZERS=true
PHP_FPM_INSTALL_MYSQL_CLIENT=true

MYSQL_VERSION=latest
MYSQL_DATABASE=bussiness_01
MYSQL_USER=default
MYSQL_PASSWORD=secret
```
Edit nginx config:
```sh
cd laradock/nginx/sites
touch bussiness_01.conf
```

Add nginx config:
```sh
vi bussiness_01.conf
```
Add content:
```sh
server {
    listen 80;
    listen [::]:80;
    server_name bussiness_01.test;
    root /var/www/bussiness_01/public;
    index index.php index.html index.htm;
    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }
    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_pass php-upstream;
        fastcgi_index index.php;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fixes timeouts
        fastcgi_read_timeout 600;
        include fastcgi_params;
    }
    location ~ /\.ht {
        deny all;
    }
    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt/;
        log_not_found off;
    }
    error_log /var/log/nginx/bussiness_01_error.log;
    access_log /var/log/nginx/bussiness_01_access.log;
}
```

Edit host file:
```sh
sudo vi /etc/hosts
```

Add content:
```sh
127.0.0.1 bussiness_01.test
```

#### 2. Source code:
Clone code:
```sh
git clone https://github.com/donganhvuphp/bussiness_1.git
cd bussiness_01
cp .env.example .env
```

Run docker:
```sh
cd laradock
docker-compose up -d mysql nginx workspace
```

Open workspace:
```sh
docker-compose exec workspace bash
cd /var/wwww/bussiness_01
yarn
```

Build vendor

```sh
docker-compose exec workspace bash
cd /var/wwww/bussiness_01
composer install
php artisan migrate --seed
npm run production
phpunit
php artisan storage:link
```

Add cronjob

```sh
crontab -e
```
Add content as below:
```sh
* * * * * cd /var/www/bussiness_01 && php artisan schedule:run >> /dev/null 2>&1
