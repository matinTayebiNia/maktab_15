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
        $this->routes["GET"][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes["POST"][$path] = $callback;
    }

    public function put(string $path, $callback)
    {
        $this->routes["PUT"][$path] = $callback;
    }

    public function delete(string $path, $callback)
    {
        $this->routes["DELETE"][$path] = $callback;
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
            if (!$callback) {
                $callback = $this->getCallback();
                if ($callback === false) {
                    $this->response->setStatusCode(404);
                    return Application::$app->view->renderView("errors/_404");
                }
            }

            if (is_string($callback)) {
                return Application::$app->view->renderView($callback);
            }
            if (is_array($callback)) {
                $controller = new $callback[0]();
                Application::$app->controller = $controller;
                $controller->action = $callback[1];
                foreach ($controller->getMiddleware() as $middleware) {
                    $middleware->execute($this->request, $this->response);
                }
                $callback[0] = $controller;
            }
            return call_user_func($callback, $this->request, $this->response);
        } catch (\Exception $exception) {
            return $exception->getMessage() . "||file:" . $exception->getFile() . "||line: " . $exception->getLine();
        }

    }

    protected function getCallback()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $path = trim($path, "/");

        $routes = $this->routes[$method];

        $routeParams = false;

        foreach ($routes as $route => $callback) {
            $route = trim($route, "/");
            $routeNames = [];
            if (!$route) {
                continue;
            }
            if (preg_match_all("/\{(\w+)(:[^}]+)?}/", $route, $matches)) {
                $routeNames = $matches[1];
            }

            $routeRegex = "@^" . preg_replace_callback("/\{\w+(:([^}]+))?}/"
                    , fn($m) => isset($m[2]) ? "({$m[2]})" : "(\w+)", $route) . "$@";

            if (preg_match_all($routeRegex, $path, $valueMatches)) {
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                $routeParams = array_combine($routeNames, $values);

                $this->request->setRouteParams($routeParams);

                return $callback;
            }

        }
        return false;
    }


}