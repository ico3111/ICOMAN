<?php

function verifyLogin() {
    session_start();

    $currentPage = basename($_SERVER['PHP_SELF']);
    $allowedPages = ['index.php', 'login.php', 'register.php', 'doLogin.php', 'doRegister.php'];
    
    if (!isset($_SESSION['user']) && !in_array($currentPage, $allowedPages)) {
        header('Location: '.URL_ROOT.'/index.php');
    }
}

function isLoggedIn() {
    session_start();
    return isset($_SESSION['user']);
}