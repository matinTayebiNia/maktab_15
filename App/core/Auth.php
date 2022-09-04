<?php

namespace App\core;

use App\Models\User;

class Auth
{
    public static function attemptLogin($authenticateInput, $password)
    {
        $user = Application::$app->userClass::where(Application::$authenticateInput, $authenticateInput)->first();
        if (!$user || !password_verify($password, $user->password)) {
            $validation = Application::$app->validation;
            $validation->addError(Application::$authenticateInput,
                "کد ملی یا رمز عبور اشتباه است.");
            Application::$app->session->setFlash("errors", $validation);
            return redirect(Application::$app->request->getPath());
        }
        Application::$app->login($user);
        return true;
    }

    public static function user(): ?User
    {
        return Application::$app->user;
    }
}