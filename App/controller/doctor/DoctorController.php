<?php

namespace App\controller\doctor;

use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\IsDoctor;
use App\Middlewares\RedirectIfIsNotAuthenticated;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
        $this->setMiddleware(new IsDoctor());
        $this->setLayout("doctorLayout");
    }

    public function index(): bool|array|string
    {
        return $this->render("doctors/index");
    }

    public function edit()
    {

    }

    public function update(Request $request)
    {
        //todo : implement update doctors Info
        $validation = $request->validation([], []);

    }


}