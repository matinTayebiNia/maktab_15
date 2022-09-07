<?php

namespace App\Middlewares;

use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;

class RedirectIfIsNotAuthenticated extends BaseMiddleware
{

    public function execute(Request $request, Response $response)
    {
        if ($request->user()) {
            return true;
        }
        return $response->redirect("/login");
    }
}