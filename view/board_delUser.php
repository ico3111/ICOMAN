<?php

require_once('./../vendor/autoload.php');
require_once('./../utils.php'); 

use Controller\BoardController;

verifyLogin();
verifyPrefsPosted();

$controller = new BoardController();
$controller->removeUserFromBoard();