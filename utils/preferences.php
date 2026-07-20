<?php

function verifyPrefsPosted() {
    if (!isset($_POST['themeImage']) or !isset($_POST['themeMode'])) {
        return;
    } 
    
    setcookie("preferences-theme", $_POST['themeMode'], time() + 10000000, '/');
    setcookie("preferences-image", $_POST['themeImage'], time() + 10000000, '/');
}