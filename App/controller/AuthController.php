<?php

namespace App\controller;

use App\core\Auth;
use App\core\Controller;
use App\core\Request\Request;
use App\core\Response;
use App\Middlewares\RedirectIfAuthenticated;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware(new RedirectIfAuthenticated());
    }

    public function loadFormLogin(Request $request): string
    {
        return render("auth/login");
    }

    public function login(Request $request)
    {

        $validation = $request->validation([
            "National_Code" => ["required", "integer", ["min" => 2], ["max" => 11]],
            "password" => ["required", ["min" => 8]]
        ], [
            "National_Code.required" => "کد ملی الزامی میباشد",
            "National_Code.integer" => "کد ملی معتبر نمیباشد",
            "National_Code.min" => "کد ملی باید بیشتر {min} کاراکتر باشد.",
            "National_Code.max" => "کد ملی باید کمتر {max} کاراکتر باشد.",
            "password.required" => "رمز عبور الزامی میباشد",
            "password.min" => "رمز عبور باید بیشتر {min} کاراکتر باشد.",
        ]);

        if (Auth::attemptLogin($validation->getAttribute("National_Code")
            , $validation->getAttribute("password"))) {
            return match ($request->user()->TypeUser()) {
                "doctor" => redirect("/doctors/index"),
                "patient" => redirect("/patient/index"),
                "manager" => redirect("/admin/index"),
                default => false,
            };

        }
    }

    public function loadFormRegister(): bool|array|string
    {
        return $this->render("auth/register");
    }

    public function register(Request $request)
    {

        $validation = $request->validation([
            "name" => ["required", ["min" => 2]],
            "lastName" => ["required"],
            "National_Code" => ["required", ["max" => 11], ["unique" => User::class]],
            "address" => ["required"],
            "type_user" => ["required", ["in" => ["patient", "manager", "doctor"]]],
            "password" => ["required", ["min" => 8]],
        ], [
            "name.required" => "فیلد نام الزامی میباشد",
            "name.min" => "فیلد نام باید بیشتر از  {min}  کاراکتر باشد",
            "lastName.required" => "نام خانوادگی الزامی میباشد",
            "National_Code.required" => "کد ملی الزامی میباشد.",
            "National_Code.max" => "کد ملی باید کمتر از {max}  کاراکتر باشد. ",
            "National_Code.unique" => "کد ملی وارد شده قبلا ثبت شده است .",
            "address.required" => "فیلد ادرس الزامی میباشد.",
            "type_user.required" => "نوع کاربر مشخص نشده!",
            "type_user.in" => "نوع کاربر معتبر نیست",
            "password.required" => "رمز عبور الزامی میباشد",
            "password.min" => "رمز عبور باید بیشتر از {min}  کاراکتر باشد."
        ]);

        $user = User::create([
            'name' => $validation->getAttribute("name"),
            'lastname' => $validation->getAttribute("lastName"),
            'password' => $validation->getAttribute("password"),
            'National_Code' => $validation->getAttribute("National_Code"),
            "type_user" => $validation->getAttribute("type_user"),
            "address" => $validation->getAttribute("address")
        ]);

        switch ($validation->getAttribute("type_user")) {
            case "patient":
                $user->patient()->create();
                break;
            case "manager":
                $user->admin()->create();
                break;
            case "doctor":
                $user->doctor()->create();
        }

        return $this->redirect("/login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}