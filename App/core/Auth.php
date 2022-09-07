<?php

namespace App\core;

use App\Models\User;
use JetBrains\PhpStorm\Pure;

class Auth
{
    protected static ?User $user;
    protected static string $userClass;
    protected static Auth $auth;
    protected static Session $session;
    protected static string $authenticateInput;

    private function __construct(Session $session, string $AuthenticateInput, string $userClass)
    {
        self::$authenticateInput = $AuthenticateInput;
        self::$session = $session;
        self::$userClass = $userClass;
    }

    public function checkIsAuthenticated()
    {
        $primaryValue = self::$session->get("user");
        if ($primaryValue) {
            self::$user = self::$userClass::find($primaryValue);
        } else {
            self::logout();
        }
    }

    public static function getInstance(Session $session, string $AuthenticateInput, string $userClass): Auth
    {
        if (!isset(self::$auth)) {
            self::$auth = new self($session, $AuthenticateInput, $userClass);
        }
        return self::$auth;
    }

    public static function attemptLogin($authenticateInput, $password)
    {
        $user = self::$userClass::where(self::$authenticateInput, $authenticateInput)->first();
        if (!$user || !password_verify($password, $user->password)) {
            $validation = Application::$app->validation;
            $validation->addError(self::$authenticateInput,
                "کد ملی یا رمز عبور اشتباه است.");
            self::$session->setFlash("errors", $validation);
            return redirect(back());
        }
        self::login($user);
        return true;
    }

    public static function user(): ?User
    {
        return self::$user;
    }

    public static function logout()
    {
        self::$user = null;
        self::$session->remove("user");
    }

    protected static function login(User $user)
    {
        self::$user = $user;
        self::$session->set("user", self::$user->id);
    }

    #[Pure]
    public static function isGuest(): bool
    {
        return !self::$user;
    }

}