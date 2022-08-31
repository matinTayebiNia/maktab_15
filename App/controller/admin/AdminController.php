<?php

namespace App\controller\admin;

use App\core\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setLayout("adminLayout");
    }

    public function index(): string
    {

        return $this->render("admin/index");
    }

    public function doctors(): string
    {
        return $this->render("admin/doctors/index");
    }

}