<?php
use core\components\Url;
use core\exceptions\newException;

function __autoload($class)
{
    $class = str_replace('\\', '/', $class);
    require_once $class . '.php';
}


$controller = Url::GetSegment(0);
$action = Url::GetSegment(1);

if (is_null($controller)) {
    $controller = "MainController";
} else {
    $controller = ucfirst(strtolower($controller)) . 'Controller';
}
if (is_null($action)) {
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
            echo $out;
        } else {
            throw new newException('Page not found');
        }
    } else {
        throw new Exception('Page not found');
    }

} catch (newException $e) {
    $e->getMessage();
} catch (Exception $e) {
    $e->getMessage();
}
