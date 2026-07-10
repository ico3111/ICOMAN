<?php

require_once('./../vendor/autoload.php');
require_once('./../utils.php'); 

use Controller\UserController;

verifyLogin();
verifyPrefsPosted();

$controller = new UserController();
$controller->showHome();