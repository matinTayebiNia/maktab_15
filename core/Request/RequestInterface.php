<?php

namespace app\core\Request;

interface RequestInterface
{

    public function getPath();

    public function getMethod();

    public function validation($rule,$message);

    public function getBody();

    public function input($input);

}