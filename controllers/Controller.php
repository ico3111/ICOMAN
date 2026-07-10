<?php

namespace Controller;

require_once('./../config.php');

abstract class Controller {

    public function redirect($url) {
        header('Location:'. $url);
        exit();
    }
    
    public function loadView($url, $data = []) {
        echo assemblePageTop($url, "style");
        extract($data);
        include('./../pages/'. $url .'.php');
        echo assemblePageFooter();
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