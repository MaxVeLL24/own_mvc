<?php

namespace core\components;

class Url
{
    static public function GetSegment($n)
    {
        $routes = self::GetSegments();
        if (empty($routes)) {
            return null;
        } else {
            return $routes[$n];
        }
    }

    static public function GetSegments()
    {
        $routsGet = $_GET['r'];
        $routs = explode('/', $routsGet);
        if (empty($routs[0])) {
            return [];
        }
        if (empty($routs[count($routs) - 1])) {
            array_pop($routs);
        }
        return $routs;
    }

}