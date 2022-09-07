<?php


use App\controller\admin\AdminAdminsController;
use App\controller\admin\AdminController;
use App\controller\admin\AdminDoctorsController;
use App\controller\admin\AdminLabController;
use App\controller\admin\AdminPatientController;
use App\controller\admin\AdminRoomController;
use App\controller\AuthController;
use App\controller\doctor\DoctorController;
use App\controller\doctor\PatientDoctorController;
use App\controller\patient\PatientController;
use App\core\Application;
use App\controller\SiteController;

$rootPath = dirname(__DIR__);
require_once $rootPath . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = require_once $rootPath . "/config/index.php";

$app = new Application($rootPath, $config);


$app->router->get("/", [SiteController::class, "home"]);

$app->router->get("/login", [AuthController::class, "loadFormLogin"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/register", [AuthController::class, "loadFormRegister"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->post("/logout", [AuthController::class, "logout"]);
$app->router->get("/labs", [SiteController::class, "laboratory"]);
$app->router->get("/labs/doctors/{id}", [SiteController::class, "doctors"]);

//patients
$app->router->get("/patient/index", [PatientController::class, "index"]);
$app->router->get("/patient/edit", [PatientController::class, "edit"]);
$app->router->put("/patient/update", [PatientController::class, "update"]);

//doctors
$app->router->get("/doctors/index", [DoctorController::class, "index"]);
$app->router->get("/doctors/edit", [DoctorController::class, "edit"]);
$app->router->put("/doctors/update", [DoctorController::class, "update"]);
$app->router->get("/doctors/patients/index", [PatientDoctorController::class, "index"]);

//admin
$app->router->get("/admin/index", [AdminController::class, "index"]);
$app->router->get("/admin/edit", [AdminController::class, "edit"]);
$app->router->put("/admin/update", [AdminController::class, "update"]);

//admin doctors
$app->router->get("/admin/doctors", [AdminDoctorsController::class, "index"]);
$app->router->get("/admin/doctors/{id}/edit", [AdminDoctorsController::class, "edit"]);
$app->router->put("/admin/doctors/{id}/update", [AdminDoctorsController::class, "update"]);
$app->router->delete("/admin/doctors/{id}/delete", [AdminDoctorsController::class, "destroy"]);
$app->router->get("/admin/doctors/{id}/lab", [AdminDoctorsController::class, "lab"]);
$app->router->post("/admin/doctors/{id}/lab", [AdminDoctorsController::class, "setLab"]);

//admin mangers
$app->router->get("/admin/mangers", [AdminAdminsController::class, "index"]);
$app->router->get("/admin/mangers/{id}/edit", [AdminAdminsController::class, "edit"]);
$app->router->put("/admin/mangers/{id}/update", [AdminAdminsController::class, "update"]);
$app->router->delete("/admin/mangers/{id}/delete", [AdminAdminsController::class, "destroy"]);

//admin patient
$app->router->get("/admin/patients", [AdminPatientController::class, "index"]);
$app->router->get("/admin/patients/{id}/edit", [AdminPatientController::class, "edit"]);
$app->router->put("/admin/patients/{id}/update", [AdminPatientController::class, "update"]);
$app->router->delete("/admin/patients/{id}/delete", [AdminPatientController::class, "destroy"]);

//admin lab
$app->router->get("/admin/labs", [AdminLabController::class, "index"]);
$app->router->get("/admin/labs/create", [AdminLabController::class, "create"]);
$app->router->post("/admin/labs/store", [AdminLabController::class, "store"]);
$app->router->get("/admin/labs/{id}/edit", [AdminLabController::class, "edit"]);
$app->router->put("/admin/labs/{id}/update", [AdminLabController::class, "update"]);
$app->router->delete("/admin/labs/{id}/delete", [AdminLabController::class, "destroy"]);

//admin rooms
$app->router->get("/admin/rooms", [AdminRoomController::class, "index"]);
$app->router->get("/admin/rooms/create", [AdminRoomController::class, "create"]);
$app->router->post("/admin/rooms/store", [AdminRoomController::class, "store"]);
$app->router->get("/admin/rooms/{id}/edit", [AdminRoomController::class, "edit"]);
$app->router->put("/admin/rooms/{id}/update", [AdminRoomController::class, "update"]);
$app->router->delete("/admin/rooms/{id}/delete", [AdminRoomController::class, "destroy"]);

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
