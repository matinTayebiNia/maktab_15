<?php

namespace App\core;

use JetBrains\PhpStorm\Pure;

abstract class Controller
{
    public function render($view, $params = []): array|bool|string
    {
        return Application::$app->view->renderView($view, $params);
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
}