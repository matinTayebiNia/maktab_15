<?php

namespace App\controller\doctor;

use App\core\Auth;
use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\IsDoctor;
use App\Middlewares\RedirectIfIsNotAuthenticated;
use App\Models\User;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
        $this->setMiddleware(new IsDoctor());
        $this->setLayout("doctorLayout");
    }

    public function index(): string
    {
        return $this->render("doctors/index");
    }

    public function edit(): string
    {
        return render("doctors/edit");
    }

    public function update(Request $request)
    {

        $validation = $request->validation([
            "Evidence" => ["required"],
            "Expert" => ["required"],
        ], [
            "Evidence.required" => "فیلد مدرک الزامی میباشد",
            "Expert.required" => "فیلد تخصص الزامی میباشد",
        ]);

        Auth::user()->doctor()->update([
            "Evidence" => $validation->getAttribute("Evidence"),
            "Expert" => $validation->getAttribute("Expert"),
        ]);
        return $this->redirect("/doctors/index");
    }


}