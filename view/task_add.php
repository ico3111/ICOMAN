<?php

require_once('./../vendor/autoload.php');
require_once('./../utils.php'); 

use Controller\TaskController;

verifyLogin();

$controller = new TaskController();
$controller->addTask();