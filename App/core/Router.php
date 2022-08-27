<?php

namespace App\core;


use App\core\Request\Request;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    /**
     * @throws \Exception
     */
    public function resolve()
    {
        try {
            $path = $this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->routes[$method][$path] ?? false;
            if ($callback === false) {
                $this->response->setStatusCode(404);
                return Application::$app->view->renderView("errors/_404");
            }

            if (is_string($callback)) {
                return Application::$app->view->renderView($callback);
            }
            if (is_array($callback)) {
                $callback[0] = new $callback[0]();
            }
            return call_user_func($callback, $this->request,$this->response);
        } catch (\Exception $exception) {
            return $exception->getMessage() . "||line: " . $exception->getLine();
        }

    }


}