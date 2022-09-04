<?php

namespace App\controller\admin;

use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\RedirectIfIsNotAuthenticated;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setLayout("adminLayout");
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
    }

    public function index(Request $request): string
    {
        return $this->render("admin/index");
    }

    public function doctors(): string
    {
        return $this->render("admin/doctors/index");
    }

}