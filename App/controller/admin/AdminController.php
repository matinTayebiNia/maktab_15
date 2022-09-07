<?php

namespace App\controller\admin;

use App\core\Auth;
use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\admin\IsAdmin;
use App\Middlewares\RedirectIfIsNotAuthenticated;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
        $this->setMiddleware(new IsAdmin());
        $this->setLayout("adminLayout");
    }

    public function index(): string
    {
        return $this->render("admin/index");
    }

    public function edit():string
    {
        return $this->render("admin/edit");
    }

    public function update(Request $request)
    {
        $validation = $request->validation([
            "email" => ["required", "email", ["unique" => Admin::class,
                "id" => Auth::user()->admin()->first()->id]]
        ], [
            "email.required" => "ایمیل الزامی میباشد",
            "email.email" => "ایمیل معتبر نیست",
            "email.unique" => "ایمیل وارده شده برای کاربر دیگری ثبت شده است ."
        ]);

        Auth::user()->admin()->update(["email" => $validation->getAttribute("email")]);
        return $this->redirect("/admin/index");
    }



}