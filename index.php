<?php
use core\components\Url;

function __autoload($class)
{
    $class = str_replace('\\', '/', $class);
    require_once $class . '.php';
}


$controller = Url::GetSegment(0);
$action = Url::GetSegment(1);

if (!is_null($controller)) {
    $controller = "MainController";
} else {
    $controller = ucfirst(strtolower($controller)) . 'Controller';
}
if (!is_null($action)) {
    $action = "actionIndex";
} else {
    $action = ucfirst(strtolower($action)) . 'Index';
}
try {
    if (file_exists('app/controllers/' . $controller . '.php')) {
        $controller = 'app\controllers\\' . $controller;
        $controller = new $controller();
        if (method_exists($controller, $action)) {
            $out = $controller->$action();
        } else {
            throw new Exception('404');
        }
    } else {
        throw new Exception('404');
    }

} catch (Exception $e) {
    $e->getMessage();

}
