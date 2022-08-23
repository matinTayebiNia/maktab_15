<?php

namespace app\core;

abstract class Controller
{
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function getBody()
    {
        return Application::$app->request->getBody();
    }

    public function toJson($value)
    {
        return json_encode($value);
    }
}