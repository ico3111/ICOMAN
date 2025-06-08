<?php

require 'vendor/autoload.php';

require_once('utils.php'); 
    verifyLogin();
    verifyPrefsPosted();

use Controller\UserController;

$controller = new UserController();

$controller->showHome();