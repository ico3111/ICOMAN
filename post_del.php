<?php

require 'vendor/autoload.php';

require_once('utils.php'); verifyLogin();

use Controller\PostController;

$controller = new PostController();

$controller->deletePost();