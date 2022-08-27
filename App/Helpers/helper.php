<?php

use app\App\core\Application;
use app\App\core\validation\validation;
use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;

if (!function_exists("basePath")) {
    function basePath($root): string
    {
        return Application::$rootDir . "/" . $root;
    }
}

if (!function_exists("errors")) {
    function errors(): validation
    {
        return Application::$app->validation;
    }
}

if (!function_exists("old")) {
    #[Pure]
    function old($input, $defaultValue = null)
    {
        return Application::$app->request->getBody() &&
        Application::$app->request->getBody()[$input] ? Application::$app->request->getBody()[$input]
            : $defaultValue;
    }
}

if (!function_exists("dd")) {
    #[NoReturn]
    function dd($obj)
    {
        echo "<pre>";
        var_dump($obj);
        echo "</pre>";
        exit();
    }
}

if (!function_exists("redirect")) {
    function redirect($root)
    {
        Application::$app->response->redirect($root);
    }
}

if (!function_exists("render")) {
    function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }
}