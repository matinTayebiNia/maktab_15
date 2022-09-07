<?php

namespace App\core;

use App\core\db\Database;
use App\core\Request\Request;
use App\core\validation\validation;
use App\Models\User;
use JetBrains\PhpStorm\Pure;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $rootDir;
    public static Application $app;
    public static string $appName;
    public validation $validation;
    public View $view;
    public Database $database;
    public Session $session;
    public string $layout;
    public ?Controller $controller = null;

    public function __construct($rootPath, array $config)
    {

        self::$appName = $config["app_name"];
        $this->layout = $config["application_main_layout"];
        self::$rootDir = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->validation = new validation();
        $this->database = Database::getInstance($config["db"]);
        $this->session = new Session($config["session_lifeTime"]);
        Auth::getInstance($this->session, $config["AuthenticateInput"], $config["userClass"])->checkIsAuthenticated();
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        echo $this->router->resolve();
    }

}