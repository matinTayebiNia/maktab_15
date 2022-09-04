<?php

namespace App\controller\doctor;

use App\core\Controller;
use App\Middlewares\ApprovedDoc;
use App\Middlewares\IsDoctor;
use App\Middlewares\RedirectIfAuthenticated;

class PatientDoctorController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware(new RedirectIfAuthenticated());
        $this->setMiddleware(new IsDoctor());
        $this->setMiddleware(new ApprovedDoc());
        $this->setLayout("doctorLayout");
    }

    public function index(): string
    {
        return $this->render("doctors/patients/index");
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}