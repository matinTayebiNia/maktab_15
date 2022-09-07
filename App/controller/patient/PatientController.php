<?php

namespace App\controller\patient;

use App\core\Auth;
use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\RedirectIfIsNotAuthenticated;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->setLayout("patientLayout");
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
    }

    public function index(): string
    {
        return $this->render("patient/index");
    }

    public function edit(Request $request): string
    {
        $patient = $request->user()->patient()->first();
        return $this->render("patient/edit", compact("patient"));
    }

    public function update(Request $request)
    {
        $validation = $request->validation([
            "blood_type" => ["required"],
            "Type_of_disease" => ["required"]
        ], [
            "blood_type.required" => "گروه خونی وارد نشده",
            "Type_of_disease.required" => "نوع بیماری وارد نشده"
        ]);

        Auth::user()->patient()->update([
            "blood_type" => $validation->getAttribute("blood_type"),
            "Type_of_disease" => $validation->getAttribute("Type_of_disease"),
        ]);

        $this->setFlashMessages("success", "اطلاعات شما با موفقیت  ویرایش شد");
        return $this->redirect("/patient/index");
    }

}