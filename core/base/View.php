<?php

namespace core\base;


class View
{
    protected $_layout = 'app/views/layout.php';

    public function render($tpl, $data)
    {
        extract($data);
        $path = 'app/views/' . $tpl . '.php';
        if (!file_exists($path)) {
            throw new \Exception('View file: ' . $path . ' not found');
        }
        ob_start();
        include($path);
        $content = ob_get_clean();
        ob_start();
        include $this->_layout;
        return ob_get_clean();
    }

}