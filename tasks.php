<?php

require 'vendor/autoload.php';

require_once('utils.php'); 
    verifyLogin();
    verifyPrefsPosted();

use Controller\TaskController;

$controller = new TaskController();

$controller->showTasks();