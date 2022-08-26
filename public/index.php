<?php


use app\controller\SiteController;
use app\core\Application;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$rootPath = dirname(__DIR__);

$app = new Application($rootPath);


$app->router->get("/", [SiteController::class,"home"]);

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
