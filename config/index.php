<?php
return [
    "session_lifeTime" => $_ENV["SESSION_LIFETIME"],
    "application_main_layout" => "main",
    "app_name" => $_ENV["APP_NAME"],
    "db" => [
        "user" => $_ENV["DB_USERNAME"],
        "password" => $_ENV["DB_PASSWORD"],
        "dsn"=> $_ENV["DB_DRIVER"] . ":host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_DATABASE"]
    ],
];