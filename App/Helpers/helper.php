<?php

use App\core\Application;
use App\core\validation\validation;
use JetBrains\PhpStorm\NoReturn;
use JetBrains\PhpStorm\Pure;

if (!function_exists("basePath")) {
    function basePath($root): string
    {
        return Application::$rootDir . "/" . $root;
    }
}

if (!function_exists("errors")) {
    function errors($value)
    {
        if (Application::$app->session->getFlash("errors") instanceof validation) {
            return Application::$app->session->getFlash("errors")->getFirstError($value) ?? null;
        }
    }
}

if (!function_exists("old")) {
    #[Pure]
    function old($input, $defaultValue = null)
    {
        return Application::$app->session->getFlash("errors") &&
        Application::$app->session->getFlash("errors")->getAttribute($input) ?
            Application::$app->session->getFlash("errors")->getAttribute($input) : $defaultValue;
    }
}

if (!function_exists("dd")) {
    #[NoReturn]
    function dd($obj, ...$objs)
    {
        echo "<pre>";
        if (!empty($objs))
            var_dump($obj, $objs);
        else
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
    function render($view, $params = []): string
    {
        return Application::$app->view->renderView($view, $params);
    }
}

if (!function_exists("app_name")) {
    function app_name()
    {
        return Application::$appName;
    }
}