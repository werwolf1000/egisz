<?php

namespace vendor\core;

class Controller
{

    public function render($template, Array $data): false|string
    {
        extract($data);
        ob_start();
        include(dirname(__DIR__) . DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $template);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}