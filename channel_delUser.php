<?php

require 'vendor/autoload.php';

require_once('utils.php'); 
    verifyLogin();
    verifyPrefsPosted();

use Controller\ChannelController;

$controller = new ChannelController();

$controller->removeUserFromChannel();