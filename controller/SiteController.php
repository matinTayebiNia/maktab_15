<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Request\Request;

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            "name" => "matinTayebi"
        ];
        return $this->render("home", $params);
    }

    public function contact()
    {
        return $this->render("contact");
    }

    public function contactPost(Request $request)
    {
        $data = $request->validation([
            "email" => ["required", "email"]
        ], [
            "email.required" => "ایمیل الزامی باشد",
        ]);

        return $this->toJson($this->getBody());
    }

}