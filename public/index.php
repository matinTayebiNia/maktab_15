<?php


use App\controller\admin\AdminController;
use App\controller\AuthController;
use App\core\Application;
use App\controller\SiteController;

require_once dirname(__DIR__) . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = require_once dirname(__DIR__) . "/config/index.php";
$rootPath = dirname(__DIR__);
$app = new Application($rootPath, $config);


$app->router->get("/", [SiteController::class, "home"]);

$app->router->get("/contact", [SiteController::class, "contact"]);
$app->router->get("/login", [AuthController::class, "loadFormLogin"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/register", [AuthController::class, "loadFormRegister"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->post("/contact", [SiteController::class, "contactPost"]);

//panel
//admin
$app->router->get("/admin/index", [AdminController::class, "index"]);
$app->router->get("/admin/doctors", [AdminController::class, "doctors"]);
try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
