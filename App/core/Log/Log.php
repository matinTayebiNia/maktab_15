<?php

namespace App\core\Log;

class Log
{
    public static function setMessageWithTime($message)
    {
        echo "[" . Colors::setColor(date("Y-m-d H:i:s"), Colors::LIGHT_CYAN_COLORS) . "] - " .
            Colors::setColor($message, Colors::GREEN_COLORS) . PHP_EOL;
    }

    public static function setSuccessMessage($message)
    {
        echo Colors::setColor($message, Colors::GREEN_COLORS);
    }

    public static function setErrorMessage($message)
    {
        echo Colors::setColor($message, Colors::RED_COLORS);
    }
}