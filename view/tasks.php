<?php

require_once('./../vendor/autoload.php');
require_once('./../utils.php');

use Controller\TaskController;

verifyLogin();
verifyPrefsPosted();

$controller = new TaskController();
$controller->showTasks();