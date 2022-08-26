<?php

use app\core\Application;
use app\core\validation\validation;
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