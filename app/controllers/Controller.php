<?php

namespace controllers;

class Controller {
    protected function render($view, $data = []) {
        ob_start();
        extract($data);
        include __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/views/shared/header.php";
    }
}
