<?php

namespace Controller;

use Model\Entity\User;

require_once('./../config.php');

abstract class Controller {

    public function redirect($url) {
        header('Location:'. $url);
        exit();
    }
    
    public function loadView($url, $data = []) {
        echo assemblePageTop($url, "style");
        // Captura e erros ou menssagens na URL
        $data[] = [$_GET['message'] ?? null, $_GET['error'] ?? null];
        
        extract($data);
        include('./../pages/'. $url .'.php');

        echo assemblePageFooter();
    }

    public function getSessionUser(): User
    {
        return new User(
            $_SESSION['user']->getId(),
            $_SESSION['user']->getUsername(),
            $_SESSION['user']->getPassword()
        );
    }
}