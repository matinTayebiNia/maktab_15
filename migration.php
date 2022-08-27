<?php

use App\core\Application;

require_once __DIR__ . "./vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = require_once "./config/index.php";
$app = new Application(__DIR__, $config);

$app->database->applyMigrations();