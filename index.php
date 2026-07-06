<?php 

require 'vendor/autoload.php';
require_once('utils.php'); 
    verifyLogin();

if (isLoggedIn()) { 
    header('Location: home.php'); 
}

header('Location: '. LOGIN);
exit;