<?php

namespace Controller;

require_once __DIR__ . '/../config.php';

abstract class Controller {

    public function redirect($url) {
        header('Location:'. $url);
        exit();
    }
    
    public function loadView($url, $data = []) {
        extract($data);
        include('views/'. $url .'.php');
    }

    public function getUserId() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user']->getId();
        }
    }

    public function getUserName() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user']->getUsername();
        }
    }
}