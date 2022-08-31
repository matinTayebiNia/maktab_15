# php_mvc

## installation

-------------------
download project and Run the following code in terminal 
```
composer install 
```
------------

## database

------------
create a database in your phpmyadmin,
put your database name in `.env` file

```dotenv
DB_DRIVER={driver}
DB_HOST={host}
DB_DATABASE={database}
DB_USERNAME={username}
DB_PASSWORD=
APP_NAME="{name of project}"
SESSION_LIFETIME={lifetime}
```

and run the following code 

```
php migration.php
```
--------------

## erd database

--------------------

![erd database](hospital%20diagram%20-%20Database%20ER%20diagram%20(crow's%20foot).png)
