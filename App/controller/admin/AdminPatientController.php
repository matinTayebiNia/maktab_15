<?php

namespace App\controller\admin;

use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\admin\ApprovedAdmin;
use App\Middlewares\admin\IsAdmin;
use App\Middlewares\RedirectIfIsNotAuthenticated;
use App\Models\Patient;

class AdminPatientController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
        $this->setMiddleware(new IsAdmin());
        $this->setMiddleware(new ApprovedAdmin());
        $this->setLayout("adminLayout");
    }

    public function index(Request $request): string
    {

        $doctor = Patient::query();
        $search_data = null;
        if ($word = $request->input("search")) {
            $search_data = $doctor->where("blood_type", "LIKE", "%{$word}%")
                ->orWhere("Type_of_disease", "LIKE", "%{$word}%")
                ->orWhereHas("user", function ($query) use ($word) {
                    return $query->where("name", "LIKE", "%{$word}%")
                        ->orWhere("lastname", "LIKE", "%{$word}%");
                })->latest()->get();
        }

        list($paginate, $data) = Patient::pagination(4, $search_data);
        return $this->render("admin/patients/index",
            compact("paginate", "data"));
    }

    public function edit(Request $request): string
    {
        $id = $request->getRouteParam("id");
        $patient = Patient::find($id);
        return render("admin/patients/edit", compact("patient"));
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

        $id = $request->getRouteParam("id");
        $doctor = Patient::find($id);
        $doctor->update([
            "blood_type" => $validation->getAttribute("blood_type"),
            "Type_of_disease" => $validation->getAttribute("Type_of_disease"),
        ]);

        $this->setFlashMessages("success", "بیمار مورد نظر با موفقیت  ویرایش شد");
        return $this->redirect("/admin/patients");
    }

    public function destroy(Request $request)
    {
        $id = $request->input("delete_id");
        try {

            //delete
            Patient::find($id)
                ->user()->first()->delete();

            //set success message
            $this->setFlashMessages("success", "بیمار مورد نظر با موفقیت پاک شد");
            return $this->redirect("/admin/patients");
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}