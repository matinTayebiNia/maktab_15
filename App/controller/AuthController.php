<?php

namespace App\controller;

use App\core\Controller;
use App\core\Request\Request;

class AuthController extends Controller
{
    public function loadFormLogin(): string
    {
        return render("auth/login");
    }

    public function login(Request $request)
    {

        $request->validation([
            "National_Code" => ["required", "integer", ["min", "min" => 2], ["max", "max" => 11]],
            "password" => ["required"]
        ], [
            "National_Code.required" => "کد ملی الزامی میباشد",
            "National_Code.integer" => "کد ملی معتبر میباشد",
            "password.required" => "رمز عبور الزامی میباشد",
        ]);

        return redirect("admin/index");
    }

    public function loadFormRegister(): bool|array|string
    {
        return $this->render("auth/register");
    }

    public function register(Request $request)
    {
        $request->validation([
            "name" => ["required"],
            "lastName" => ["required"],
            "National_Code" => ["required"],
            "typeUser" => ["required"],
            "password" => ["required"],
        ], [
            "name.required" => "فیلد نام الزامی میباشد"
        ]);

        return $this->redirect("/login");
    }
}