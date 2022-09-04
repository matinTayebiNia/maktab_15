<?php

namespace App\core;

use App\core\Middleware\BaseMiddleware;
use JetBrains\PhpStorm\Pure;

abstract class Controller
{
    protected array $middleware = [];
    public string $action = "";
    public string $layout = "main";

    public function render($view, $params = []): array|bool|string
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    public function setFlashMessages($key, $message)
    {
         Application::$app->session->setFlash($key, $message);
    }

    #[Pure]
    public function getBody(): array
    {
        return Application::$app->request->getBody();
    }

    public function toJson($value): bool|string
    {
        return json_encode($value);
    }

    public function redirect($root)
    {
         Application::$app->response->redirect($root);
    }

    /**
     * @return array
     */
    public function getMiddleware(): array
    {
        return $this->middleware;
    }

    /**
     * @param BaseMiddleware $middleware
     */
    public function setMiddleware(BaseMiddleware $middleware): void
    {
        $this->middleware[] = $middleware;

    }
}