<?php

namespace app\core;

abstract class Controller
{
    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function getBody()
    {
        return Application::$app->request->getBody();
    }

    public function toJson($value)
    {
        return json_encode($value);
    }

    public function redirect($root)
    {
         Application::$app->response->redirect($root);
    }
}