<?php

require_once('./../vendor/autoload.php');
require_once('./../utils.php'); 

use Controller\PostController;

verifyLogin();

$controller = new PostController();
$controller->deletePost();