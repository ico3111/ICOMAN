<?php

require 'vendor/autoload.php';

require_once('utils.php'); verifyLogin();

use Controller\UserController;

$controller = new UserController();

$controller->doLogin();