<?php

namespace App\Middlewares;

use App\core\Middleware\BaseMiddleware;
use App\core\Request\Request;
use App\core\Response;

class ApprovedDoc extends BaseMiddleware
{

    public function execute(Request $request, Response $response)
    {
        if ($request->user()->doctor()->Expert != null
            && $request->user()->doctor()->Evidence != null
            && $request->user()->doctor()->status != false) {
            return true;
        }
        return $response->redirect(back());
    }
}