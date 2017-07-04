<?php

namespace core\components;


class Url
{
    /**
     * @param integer $n
     * @return string | null
     */
    static public function getRouteSegment($n)
    {
        $segments = self::getRouteSegments()[$n];
        if (!empty($segments[$n])) {
            return $segments[$n];
        }
        return null;
    }

    /**
     * @return array
     */
    static public function getRouteSegments()
    {
        $url = $_GET['r'];
        $segment = explode('/', $url);
        if (empty($segment[0])) {
            return [];
        }
        $lastindex = count($segment) - 1;
        if (empty($segment[$lastindex])) {
            array_pop($segment);
        }
        return $segment;
    }

    /**
     * @param  string $param
     * @return string null
     */
    static public function getParam($param)
    {
        return isset($_GET[$param]) ? $_GET[$param] : null;
    }
}