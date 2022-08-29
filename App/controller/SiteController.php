<?php

namespace App\controller;


use App\core\Controller;
use App\core\Request\Request;
use App\core\Response;

class SiteController extends Controller
{

    public function home(): array|bool|string
    {
        $params = [
            "name" => "matinTayebi"
        ];
        return $this->render("home", $params);
    }

    public function contact(Request $request)
    {
        return $this->render("contact");
    }

    public function contactPost(Request $request, Response $response)
    {

        $validation = $request->validation([
            "email" => ["required", "email"],
            "subject" => ["required", ["min", "min" => 2]],
            "description" => ["required"]
        ], [
            "email.required" => "ایمیل الزامی می باشد",
            "email.email" => "ایمیل معتبر نیست",
            "description.required" => "توضیحات الزامی میباشد",
        ]);



        return $this->toJson($validation->subject);

    }

}