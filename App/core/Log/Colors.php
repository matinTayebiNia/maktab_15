<?php

namespace App\core\Log;

class Colors
{
    const RED_COLORS = 1;
    const GREEN_COLORS = 2;
    const YELLOW_COLORS = 3;
    const BLUE_COLORS = 4;
    const MAGENTA_COLORS = 5;
    const CYAN_COLORS = 6;
    const LIGHT_GRAY_COLORS = 7;
    const DARK_GRAY_COLORS = 8;
    const LIGHT_RED_COLORS = 9;
    const LIGHT_GREEN_COLORS = 10;
    const LIGHT_YELLOW_COLORS = 11;
    const LIGHT_BLUE_COLORS = 12;
    const LIGHT_MAGENTA_COLORS = 13;
    const LIGHT_CYAN_COLORS = 14;

    public static function setColor($content, $color = null): string
    {
        if (!is_numeric($color)) {
            // no color was set so lets pick a random one...
            $color = rand(1, 14);
        }
        $cfooter = "\033[0m";
        // let check which color code was used so we can then wrap our content.
        $cheader = self::setChosenColor($color);
        // wrap our content and
        //return our new content.
        return $cheader . $content . $cfooter;
    }

    /**
     * @param int $color
     * @return string
     */
    private static function setChosenColor(int $color): string
    {
        $cheader='';
        switch ($color) {
            case self::RED_COLORS:
                // color code header.
                $cheader .= "\033[31m";
                break;
            case self::GREEN_COLORS:
                // color code header.
                $cheader .= "\033[32m";
                break;
            case self::YELLOW_COLORS:
                // color code header.
                $cheader .= "\033[33m";
                break;

            case self::BLUE_COLORS:
                // color code header.
                $cheader .= "\033[34m";
                break;

            case self::MAGENTA_COLORS:
                // color code header.
                $cheader .= "\033[35m";
                break;

            case self::CYAN_COLORS:
                // color code header.
                $cheader .= "\033[36m";
                break;

            case self::LIGHT_GRAY_COLORS:
                // color code header.
                $cheader .= "\033[37m";
                break;
            case self::DARK_GRAY_COLORS:
                // color code header.
                $cheader .= "\033[90m";
                break;
            case self::LIGHT_RED_COLORS:
                // color code header.
                $cheader .= "\033[91m";
                break;
            case self::LIGHT_GREEN_COLORS:
                // color code header.
                $cheader .= "\033[92m";
                break;
            case self::LIGHT_YELLOW_COLORS:
                // color code header.
                $cheader .= "\033[93m";
                break;
            case self::LIGHT_BLUE_COLORS:
                // color code header.
                $cheader .= "\033[94m";
                break;
            case self::LIGHT_MAGENTA_COLORS:
                // color code header.
                $cheader .= "\033[95m";
                break;
            case self::LIGHT_CYAN_COLORS:
                // color code header.
                $cheader .= "\033[96m";
                break;
        }
        return $cheader;
    }
}