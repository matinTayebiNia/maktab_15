<?php

namespace App\controller\admin;

use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\admin\ApprovedAdmin;
use App\Middlewares\admin\IsAdmin;
use App\Middlewares\RedirectIfIsNotAuthenticated;
use App\Models\Admin;

class AdminAdminsController extends Controller
{

    public function __construct()
    {
        $this->setLayout("adminLayout");
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
        $this->setMiddleware(new IsAdmin());
        $this->setMiddleware(new ApprovedAdmin());
    }

    public function index(Request $request): string
    {
        $search_data = null;
        $doctor = Admin::query();
        if ($word = $request->input("search")) {
            $search_data = $doctor->where("email", "LIKE", "%{$word}%")
                ->orWhereHas("user", function ($query) use ($word) {
                    return $query->where("name", "LIKE", "%{$word}%")
                        ->orWhere("lastname", "LIKE", "%{$word}%");
                })->latest()->get();
        }

        list($paginate, $data) = Admin::pagination(4, $search_data);

        return $this->render("admin/usersAdmin/index", compact("paginate", "data"));

    }

    public function edit(Request $request): string
    {
        $id = $request->getRouteParam("id");
        $admin = Admin::find($id);
        return $this->render("admin/usersAdmin/edit", compact("admin"));
    }

    public function update(Request $request)
    {
        $id = $request->getRouteParam("id");
        $admin = Admin::find($id);
        $validation = $request->validation([
            "email" => ["required", "email", ["unique" => Admin::class, "id" => $admin->id]],
            "status" => ["required", ["in" => ["0", "1"]]]
        ], [
            "email.required" => "ایمیل الزامی میباشد",
            "email.email" => "ایمیل معتبر نیست",
            "email.unique" => "ایمیل وارد شده برای کس دیگری ثبت شده است.",
            "status.required" => "فیلد وضعیت وارد نشده.",
            "status.in" => "مقدار فیلد وضعیت معتبر نیست."
        ]);

        $admin->update([
            "email" => $validation->getAttribute("email"),
            "status" => $validation->getAttribute("status")
        ]);

        $this->setFlashMessages("success", "ادمین مورد نظر با موفقیت ویرایش شد.");
        return $this->redirect("/admin/mangers");
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input("delete_id");
            Admin::find($id)
                ->user()->first()->delete();
            $this->setFlashMessages("success", "ادمین مورد نظر با موفقیت پاک شد.");
            return $this->redirect("/admin/mangers");
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}