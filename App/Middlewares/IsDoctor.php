<?php

namespace App\Middlewares;

use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;

class IsDoctor extends BaseMiddleware
{

    public function execute(Request $request, Response $response)
    {
        if ($request->user()->TypeUser() == "doctor") {
            return true;
        }
        return $response->redirect(back());
    }
}