<?php
return [
    "db" => [
        "user" => $_ENV["DB_USERNAME"],
        "password" => $_ENV["DB_PASSWORD"],
        "dsn"=> $_ENV["DB_DRIVER"] . ":host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_DATABASE"]
    ],
];