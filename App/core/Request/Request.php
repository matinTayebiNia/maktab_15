<?php

namespace App\core\Request;

use App\core\Auth;
use App\core\validation\validation;
use App\core\Application;
use App\Models\User;
use JetBrains\PhpStorm\Pure;

class Request implements RequestInterface
{

    private array $routeParams = [];

    public function getPath()
    {
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    public function getMethod(): string
    {
        $request_method = $_SERVER['REQUEST_METHOD'];

        if ($request_method === 'POST' && isset($_POST['_method'])) {
            $request_method = $_SERVER["REQUEST_METHOD"] = htmlspecialchars($_POST['_method']);
        }

        return $request_method;
    }

    /**
     * receive data of user from frontend
     *
     * @return array
     */
    #[Pure]
    public function getBody(): array
    {
        $body = [];
        if ($this->getMethod() === "GET") {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } else if ($this->getMethod() === "POST" ||
            $this->getMethod() === "PUT" ||
            $this->getMethod() === "DELETE") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                if (is_array($value)) {
                    $body[$key] = array_map(function ($item) {
                        return htmlspecialchars($item);
                    }, $value);
                }

            }
        }
        return $body;
    }

    /**
     * set validation for data
     *
     * @param $rule
     * @param array $message
     * @return validation|void
     */
    public function validation($rule, $message = [])
    {
        $validation = Application::$app->validation;
        $validation->loadData($this->getBody());
        $validation->setRule($rule);
        $validation->setMessages($message);
        if (!$validation->SetupRule()) {
            Application::$app->response->setStatusCode(400);
            Application::$app->session->setFlash("errors", $validation);
            return redirect($this->back());
        }
        return $validation;
    }

    /**
     * if user authenticated ? return instance of user
     */
    #[Pure]
    public function user(): ?User
    {
        return Auth::user();
    }


    /**
     * It returns the previous path that the user was on ,
     * if path dose not exists return: /
     *
     * @return mixed|string
     */
    public function back(): mixed
    {
        return $_SERVER['HTTP_REFERER'] ?? "/";
    }


    /**
     * return special data which received from frontend
     *
     * @param $input
     * @return mixed|string
     */
    #[Pure]
    public function input($input): mixed
    {
        return $this->getBody()[$input] ?? null;
    }


    /**
     * set routes params which received from url
     *
     * @param array $routeParams
     * @return $this
     */
    public function setRouteParams(array $routeParams): static
    {
        $this->routeParams = $routeParams;
        return $this;
    }

    /**
     * get routes params
     *
     * @param $param
     * @return mixed
     */
    public function getRouteParam($param): mixed
    {
        return $this->routeParams[$param];
    }
}