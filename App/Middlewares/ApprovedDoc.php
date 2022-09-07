<?php

namespace App\Middlewares;

use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;

class ApprovedDoc extends BaseMiddleware
{

    public function execute(Request $request, Response $response)
    {
        if ($request->user()->doctor()->first()->Expert != null
            && $request->user()->doctor()->first()->Evidence != null
            && $request->user()->doctor()->first()->status != false) {
            return true;
        }
        return $response->redirect(back());
    }
}