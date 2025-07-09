<?php

require 'vendor/autoload.php';

require_once('utils.php'); 
    verifyLogin();
    verifyPrefsPosted();

use Controller\BoardController;

$controller = new BoardController();

$controller->deleteBoard();