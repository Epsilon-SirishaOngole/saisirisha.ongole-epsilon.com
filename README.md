# Laravel POC with React.

## Installation Steps, run the below commands after cloning the repository.
```
   * npm install
   * comoser update
   
```

## Note: 
Below are virtual host setup. 
Open file ‘httpd-vhosts .conf’ under the folder ‘C:\xampp\apache\conf\extra\httpd-vhosts.conf’ and add below code  
```

<VirtualHost laravel.local.test:88>
    DocumentRoot "C:\xampp\htdocs\Laravel\Laravel6"
    ServerName laravel.local.test
    ErrorLog "logs/laravel.log"
    CustomLog "logs/custom.laravel.log" combined
    <Directory "C:\xampp\htdocs\Laravel\Laravel6">
        Options Indexes FollowSymLinks Includes execCGI
        AllowOverride All
        Order Deny,Allow
        Allow From All
        Require all granted
    </Directory>
</VirtualHost>

```

Open file ‘hosts’ under the folder ‘C:\windows\system32\drives\etc’ and add below line 
```
127.0.0.1 laravel.local.test 

```
