<?php

namespace App\core;

class View
{
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
        include_once Application::$rootDir . "/resources/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$rootDir . "/resources/views/$view.php";
        return ob_get_clean();
    }
}