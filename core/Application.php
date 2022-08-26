<?php

namespace app\core;

use app\core\Request\Request;
use app\core\validation\validation;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $rootDir;
    public static Application $app;
    public validation $validation;
    public View $view;

    public function __construct($rootPath)
    {
        self::$rootDir = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->validation = new validation();
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}