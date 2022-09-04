<?php
return [
    "session_lifeTime" => $_ENV["SESSION_LIFETIME"],
    "application_main_layout" => "main",
    "AuthenticateInput" => "National_Code",
    "userClass" => App\Models\User::class,
    "app_name" => $_ENV["APP_NAME"],
    "db" => [
        "user" => $_ENV["DB_USERNAME"],
        "password" => $_ENV["DB_PASSWORD"],
        "dbname" => $_ENV["DB_DATABASE"],
        "host" => $_ENV["DB_HOST"],
        "driver" => $_ENV["DB_DRIVER"],
    ],
];