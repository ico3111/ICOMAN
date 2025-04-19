<?php

require 'vendor/autoload.php';

require_once('utils.php'); verifyLogin();

use Controller\TaskController;

$controller = new TaskController();

$controller->deleteTask();