<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Request\Request;
use app\core\Response;

class SiteController extends Controller
{

    public function home()
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
            "email" =>  ["required", "email"],
            "subject" => ["required",["min","min"=>2]],
            "description" => ["required"]
        ], [
            "email.required" => "ایمیل الزامی باشد",
            "email.email" => "ایمیل معتبر نیست",
        ]);

        if (!$validation->SetupRule()) {
            return $this->render($request->getPath());
        }

        return $this->toJson("ok");

    }

}