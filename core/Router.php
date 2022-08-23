<?php

namespace app\core;


use app\core\Request\Request;

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
                return $this->renderView("errors/_404");
            }

            if (is_string($callback)) {
                return $this->renderView($callback);
            }
            if (is_array($callback)) {
                $callback[0] = new $callback[0]();
            }
            return call_user_func($callback, $this->request);
        } catch (\Exception $exception) {
            return $exception->getMessage() . "||line: " . $exception->getLine();
        }

    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    public function renderContent($content)
    {
        $layoutContent = $this->layoutContent();
        return str_replace("{{content}}", $content, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$rootDir . "/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$rootDir . "/views/$view.php";
        return ob_get_clean();
    }
}