<?php

namespace core\base;


abstract class Controller
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View();
    }

    abstract public function actionIndex();

    /**
     * @param $tpl - string
     * @param array $data
     * @return mixed
     */
    public function render($tpl, $data = [])
    {
        return $this->_view->render($tpl, $data);
    }

    public function addCss($cssName)
    {
        return $this->_view->addCss($cssName);
    }
}
