MySymfony
=========

My private version of symfony 2 !

### Install

+ Step 1: Download or `git clone` the code:

        git clone https://github.com/Lucups/MySymfony

+ Step 2: Install Symfony2 by Composer:

        # rename MySymfony to my-symfony
        cd /path/to/my-symfony/
        composer install

+ Step 3: Configure your Nginx or Apache Http Server:

        # Nginx on Windows
        server {
            listen 80;
            server_name dev.my-symfony.me;
            root /path/to/my-symfony;
            index app_dev.php;
            try_files $uri $uri/ /app_dev.php?$query_string;
            rewrite ^/app_dev\.php/?(.*)$ /$1 permanent;
            location / {
                try_files $uri @rewriteapp;
            }
            location @rewriteapp {
                rewrite ^(.*)$ /app_dev.php/$1 last;
            }
           location ~ \.php {
                fastcgi_pass   127.0.0.1:9000;
                fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
                include        fastcgi_params;
            }
        }

        # Nginx on Linux
        server {
            listen       80;
            server_name  dev.my-symfony.me;
            error_log /your/path/error.log;
            access_log /your/path/access.log;
            root   /path/to/my-symfony;
            index  index.php;
            location ~ ^/(.*)\.php(/|$){
                 try_files $uri =404;
                 fastcgi_pass  unix:/var/run/php5-fpm.sock;
                 #fastcgi_pass 127.0.0.1:9000;
                 include fastcgi_params;
            }
        }

+ Step 4: Don't forget update your hosts file:

    + on Windows, edit `C:\Windows\System32\drivers\etc\hosts`

    + on Linux, edit `/etc/hosts`

    + add a new line: `127.0.0.1  dev.my-symfony.me`

+ Step 5: Open your browser, go to `http://dev.my-symfony.me/`