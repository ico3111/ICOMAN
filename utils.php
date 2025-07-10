<?php

function verifyLogin() {
    session_start();

    $currentPage = basename($_SERVER['PHP_SELF']);
    $allowedPages = ['index.php', 'login.php', 'register.php', 'doLogin.php', 'doRegister.php'];
    if (!isset($_SESSION['user']) && !in_array($currentPage, $allowedPages)) {
        header('Location: index.php');
    }
}

function isLoggedIn() {
    session_start();
    return isset($_SESSION['user']);
}

function verifyPrefsPosted() {

    if (isset($_POST['themeImage']) && isset($_POST['themeMode'])) {
        setcookie("preferences-theme", $_POST['themeMode'], time() + 10000000, '/');
        setcookie("preferences-image", $_POST['themeImage'], time() + 10000000, '/');
    } 

}