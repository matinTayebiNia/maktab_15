<?php

namespace App\core;

use App\core\Middleware\BaseMiddleware;
use JetBrains\PhpStorm\Pure;

abstract class Controller
{
    protected array $middleware = [];
    public string $action = "";
    public string $layout = "main";

    protected function render($view, $params = []): array|bool|string
    {
        return Application::$app->view->renderView($view, $params);
    }

    protected function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    protected function setFlashMessages($key, $message)
    {
         Application::$app->session->setFlash($key, $message);
    }

    #[Pure]
    protected function getBody(): array
    {
        return Application::$app->request->getBody();
    }

    protected function toJson($value): bool|string
    {
        return json_encode($value);
    }

    protected function redirect($root)
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
    protected function setMiddleware(BaseMiddleware $middleware): void
    {
        $this->middleware[] = $middleware;

    }
}