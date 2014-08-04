### 安装

1. 下载安装包,解压到 Web 根目录；
2. 使用 Composer 安装依赖库；
3. 配置 Nginx 或 Apache Http Server；

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

4. 配置：从 app/config/parameters.yml.dist 复制为 app/config/parameters.yml，修改里面的参数以符合服务器设置；

5. 安装数据库及初始化数据：

    php bin/console doctrine:update:schema --force
    php bin/console db:init

