<?php

namespace App\core;

use App\core\db\Database;
use App\core\Request\Request;
use App\core\validation\validation;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $rootDir;
    public static Application $app;
    public validation $validation;
    public View $view;
    public Database $database;

    public function __construct($rootPath, array $config)
    {
        self::$rootDir = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->validation = new validation();
        $this->database = Database::getInstance($config["db"]);
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}