<?php

namespace app\core;

use app\core\Request\Request;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $rootDir;
    public static Application $app;

    public function __construct($rootPath)
    {
        self::$rootDir = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}