<?php

namespace App\Middlewares\admin;

use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;

class IsAdmin extends BaseMiddleware
{

    public function execute(Request $request, Response $response)
    {
        if ($request->user()->TypeUser() == "manager") {
            return true;
        }
        return $response->redirect(back());
    }
}