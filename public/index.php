<?php


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
/*$app->router->get("/contact", function (){
    return "this is test";
});*/
$app->router->post("/contact", [SiteController::class, "contactPost"]);

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
