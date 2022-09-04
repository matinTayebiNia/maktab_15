<?php


use App\controller\admin\AdminController;
use App\controller\AuthController;
use App\controller\doctor\DoctorController;
use App\controller\doctor\PatientDoctorController;
use App\core\Application;
use App\controller\SiteController;

$rootPath = dirname(__DIR__);
require_once $rootPath . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = require_once $rootPath . "/config/index.php";

$app = new Application($rootPath, $config);


$app->router->get("/", [SiteController::class, "home"]);

$app->router->get("/contact", [SiteController::class, "contact"]);
$app->router->get("/login", [AuthController::class, "loadFormLogin"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/register", [AuthController::class, "loadFormRegister"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->post("/contact", [SiteController::class, "contactPost"]);

//doctors
$app->router->get("/doctors/index", [DoctorController::class, "index"]);
$app->router->get("/doctors/patients", [PatientDoctorController::class, "index"]);

//admin
$app->router->get("/admin/index", [AdminController::class, "index"]);
$app->router->get("/admin/doctors", [AdminController::class, "doctors"]);
try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
