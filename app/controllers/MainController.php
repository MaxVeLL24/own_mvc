<?php

namespace app\controllers;

use core\base\Controller;


class MainController extends Controller
{
    public function actionIndex()
    {
        return $this->render('home', ['name' => 'John']);
    }

    public function pageIndex()
    {
        return $this->render('page', ['first' => 'Paul', 'second' => 'admin','font'=>'monospace']);
    }
}