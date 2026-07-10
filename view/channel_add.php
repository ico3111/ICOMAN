<?php

require_once('./../vendor/autoload.php');
require_once('./../utils.php'); 

use Controller\ChannelController;

verifyLogin();
verifyPrefsPosted();

$controller = new ChannelController();
$controller->addChannel();