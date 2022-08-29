<?php

namespace App\core;

class View
{

    public function renderView(string $view, array $params = []): string|array
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }


    protected function layoutContent(): bool|string
    {
        $layout = Application::$app->layout;
        if (isset(Application::$app->controller->layout)) {
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$rootDir . "/resources/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView(string $view, array $params): bool|string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$rootDir . "/resources/views/" . $view . ".php";
        return ob_get_clean();
    }

}