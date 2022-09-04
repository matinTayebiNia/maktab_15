<?php

namespace App\core\Middleware;

use App\core\Request\Request;
use App\core\Response;

abstract class BaseMiddleware
{
    abstract public function execute(Request $request, Response $response);
}