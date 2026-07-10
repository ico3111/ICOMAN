<?php

require_once('./../vendor/autoload.php');
require_once('./../utils.php'); 

use Controller\UserController;

verifyLogin();

$controller = new UserController();
$controller->showLogin();