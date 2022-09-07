<?php

namespace App\Middlewares\admin;

use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;

class ApprovedAdmin extends BaseMiddleware
{

    public function execute(Request $request, Response $response)
    {

        if ($request->user()->admin()->first()->email != null
            && $request->user()->admin()->first()->status != false) {
            return true;
        }
        return $response->redirect(back());
    }
}