<?php

namespace App\Middlewares;

use App\core\Application;
use App\core\Auth;
use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;
use JetBrains\PhpStorm\Pure;

class RedirectIfAuthenticated extends BaseMiddleware
{
    protected array $action = [];

    public function __construct(array $action = [])
    {
        $this->action = $action;
    }

    public function execute(Request $request, Response $response)
    {
        if (Auth::isGuest()) {
//            if (empty($this->action) || in_array(Application::$app->controller->action, $this->action))
                return true;
        }
        return $response->redirect(back());

    }
}