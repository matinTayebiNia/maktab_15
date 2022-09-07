<?php

namespace App\controller\admin;

use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\admin\ApprovedAdmin;
use App\Middlewares\admin\IsAdmin;
use App\Middlewares\RedirectIfIsNotAuthenticated;
use App\Models\Lab;

class AdminLabController extends Controller
{
    public function __construct()
    {
        $this->setLayout("adminLayout");
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
        $this->setMiddleware(new IsAdmin());
        $this->setMiddleware(new ApprovedAdmin());
    }

    public function index(Request $request)
    {
        $search_data = null;
        $doctor = Lab::query();
        if ($word = $request->input("search")) {
            $search_data = $doctor->where("labName", "LIKE", "%{$word}%")
                ->latest()->get();
        }

        list($paginate, $data) = Lab::pagination(4, $search_data);

        return $this->render("admin/labs/index", compact("paginate", "data"));

    }

    public function create(): string
    {
        return $this->render("admin/labs/create");
    }

    public function store(Request $request)
    {
        $validation = $request->validation([
            "labName" => ["required"],
            "address" => ["required"]
        ], [
            "labName.required" => "نام ازمایشگاه الزامی میباشد",
            "address.required" => "ادرس الزامی میباشد."
        ]);
        Lab::create([
            "labName" => $validation->getAttribute("labName"),
            "address" => $validation->getAttribute("address")
        ]);

        $this->setFlashMessages("success", "آزمایشگاه با موفقیت ثبت شد");
        return $this->redirect("/admin/labs");

    }

    public function edit(Request $request)
    {
        $id = $request->getRouteParam("id");
        $lab = Lab::find($id);
        return $this->render("admin/labs/edit", compact("lab"));
    }

    public function update(Request $request)
    {
        $validation = $request->validation([
            "labName" => ["required"],
            "address" => ["required"]
        ], [
            "labName.required" => "نام ازمایشگاه الزامی میباشد",
            "address.required" => "ادرس الزامی میباشد."
        ]);

        $id = $request->getRouteParam("id");
        $lab = Lab::find($id);

        $lab->update([
            "labName" => $validation->getAttribute("labName"),
            "address" => $validation->getAttribute("address")
        ]);

        $this->setFlashMessages("success", "آزمایشگاه با موفقیت ویرایش شد");
        return $this->redirect("/admin/labs");

    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input("delete_id");
            Lab::destroy($id);
            $this->setFlashMessages("success", "آزمایشگاه با موفقیت حذف شد");
            return $this->redirect("/admin/labs");
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}