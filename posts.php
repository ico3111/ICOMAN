<?php

require 'vendor/autoload.php';

require_once('utils.php'); 
    verifyLogin();
    verifyPrefsPosted();

use Controller\PostController;

$controller = new PostController();

$controller->showPosts();