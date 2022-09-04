<?php

namespace App\Middlewares;

use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;

class RedirectIfIsNotAuthenticated extends BaseMiddleware
{
    protected array $action = [];

    public function __construct(array $action = [])
    {
        $this->action = $action;
    }

    public function execute(Request $request, Response $response)
    {
        if ($request->user()) {
            return true;
        }
        return $response->redirect("/login");
    }
}