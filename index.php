<?php
use core\components\Url;

function __autoload($class)
{
    $class = str_replace('\\', '/', $class);
    require_once $class . '.php';
}

$controller = Url::getRouteSegment(0);
$action = Url::getRouteSegment(1);

if (is_null($controller)) {
    $controller = 'MainController';
} else {
    $controller = ucfirst(strtolower($controller)) . 'Controller';
}
if (is_null($action)) {
    $action = 'actionIndex';
} else {
    $action = 'action' . ucfirst(strtolower($action));
}

$controller = new $controller();
$output = $controller->$action;
echo $output;