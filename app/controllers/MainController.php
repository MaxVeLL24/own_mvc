<?php

namespace app\controllers;

use core\base\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $this->render('home');
    }
}