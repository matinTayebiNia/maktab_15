<?php

namespace App\core\Request;

use App\core\validation\validation;
use App\core\Application;
use JetBrains\PhpStorm\Pure;

class Request implements RequestInterface
{


    public function getPath()
    {
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    #[Pure]
    public function getBody()
    {
        $body = [];
        if ($this->getMethod() === "get") {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } else if ($this->getMethod() === "post") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    public function validation($rule, $message = []): validation
    {
        $validation = Application::$app->validation;
        $validation->loadData($this->getBody());
        $validation->setRule($rule);
        $validation->setMessages($message);
        if (!$validation->SetupRule()) {
            Application::$app->response->setStatusCode(400);
            Application::$app->session->setFlash("errors", $validation);
           return redirect(Application::$app->request->getPath());
        }
        return $validation;
    }

    #[Pure]
    public function input($input)
    {
        return $this->getBody()[$input] ?? "";
    }
}