<?php

namespace App\controller\admin;

use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\admin\ApprovedAdmin;
use App\Middlewares\admin\IsAdmin;
use App\Middlewares\RedirectIfIsNotAuthenticated;
use App\Models\Doctor;
use App\Models\Lab;

class AdminDoctorsController extends Controller
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
        $doctor = Doctor::query();
        $search_data = null;
        if ($word = $request->input("search")) {
            $search_data = $doctor->where("Evidence", "LIKE", "%{$word}%")
                ->orWhere("Expert", "LIKE", "%{$word}%")
                ->orWhereHas("user", function ($query) use ($word) {
                    return $query->where("name", "LIKE", "%{$word}%")
                        ->orWhere("lastname", "LIKE", "%{$word}%");
                })->latest()->get();
        }

        list($paginate, $data) = Doctor::pagination(4, $search_data);

        return $this->render("admin/doctors/index", compact("paginate", "data"));
    }

    public function edit(Request $request): string
    {
        $id = $request->getRouteParam("id");
        $doctor = Doctor::find($id);
        return $this->render("admin/doctors/edit", compact("doctor"));
    }

    public function update(Request $request)
    {
        //validation
        $validation = $request->validation([
            "Expert" => ["required"],
            "Evidence" => ["required"],
            "status" => ["required", "in" => ["0", "1"]]
        ], [
            "Expert.required" => "فیلد تخصص الزامی میباشد.",
            "Evidence.required" => "فیلد مدرک الزامی میباشد.",
            "status.required" => "فیلد وضعیت وارد نشده.",
            "status.in" => "مقدار فیلد وضعیت معتبر نیست."
        ]);
        //update
        $id = $request->getRouteParam("id");
        $doctor = Doctor::find($id);
        $doctor->update([
            "Expert" => $validation->getAttribute("Expert"),
            "Evidence" => $validation->getAttribute("Evidence"),
            "status" => $validation->getAttribute("status"),
        ]);
        //set success message
        $this->setFlashMessages("success", "دکتر مورد نظر با موفقیت ویرایش شد");
        return $this->redirect("/admin/doctors");
    }

    public function destroy(Request $request)
    {
        $id = $request->input("delete_id");
        try {
            //delete
            Doctor::find($id)
                ->user()->first()->delete();
            //set success message
            $this->setFlashMessages("success", "دکتر مورد نظر با موفقیت پاک شد");
            return $this->redirect("/admin/doctors");
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function lab(Request $request): string
    {
        $id = $request->getRouteParam("id");
        $doctor = Doctor::find($id);
        $labs = Lab::all();
        return $this->render("admin/doctors/lab", compact("doctor", "labs"));
    }

    public function setLab(Request $request)
    {

        $id = $request->getRouteParam("id");
        $doctor = Doctor::find($id);
        $doctor->labs()->sync($request->getBody()["lab_id"]);
        $this->setFlashMessages("success", "آزمایشگاه ها با موفقیت ثبت شد.");
        return $this->redirect("/admin/doctors");

    }
}