<?php

namespace app\core\Request;

use app\core\validation\validation;
use JetBrains\PhpStorm\Pure;

class Request implements RequestInterface
{


    public function getPath()
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
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

    public function validation($rule, $message = [])
    {
        $validation = new validation($this->getBody());
        $validation->setRule($rule);
        $validation->setMessages($message);
        return $validation->SetupRule() ? $validation : false;
    }

    #[Pure]
    public function input($input)
    {
        return $this->getBody()[$input] ?? "";
    }
}