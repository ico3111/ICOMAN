<?php

#+
#+ DEFINE INFORMACOES DA APLICACAO
#+
define("APP_NAME", "ICOMAN");
define("APP_VERSION", "1.3");
define("ADMIN_ID", 1);

#+
#+ RAIZ E DIRETORIOS DO PROJETO (Para a máquina/servidor)
#+
define("PROJECT_ROOT", __DIR__);

#+
#+ RAIZ DA URL (Para o navegador)
#+
$project_uri = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__));

define("URL_ROOT", $project_uri);
define("ENDPOINTS_URL", URL_ROOT . "/view/");
define("STYLES_URL",    URL_ROOT . "/pages/styles");
define("SCRIPTS_URL",   URL_ROOT . "/pages/scripts");
define("MEDIA_URL",     URL_ROOT . "/media");
define("MODULES", URL_ROOT . "/modules");

#+
#+ ENDPOINTS DO SISTEMA
#+

# AUTH
define("DO_LOGIN",         ENDPOINTS_URL . "doLogin.php");
define("DO_REGISTER",      ENDPOINTS_URL . "doRegister.php");
define("LOGIN",            ENDPOINTS_URL . "login.php");
define("LOGOUT",           ENDPOINTS_URL . "logout.php");
define("REGISTER",         ENDPOINTS_URL . "register.php");
define("HOME",             ENDPOINTS_URL . "home.php");

# CHANNEL
define("CHANNEL_ADD",      ENDPOINTS_URL . "channel_add.php");
define("CHANNEL_DEL",      ENDPOINTS_URL . "channel_del.php");
define("CHANNEL_ADD_USER", ENDPOINTS_URL . "channel_addUser.php");
define("CHANNEL_DEL_USER", ENDPOINTS_URL . "channel_delUser.php");
define("CHANNELS",         ENDPOINTS_URL . "channels.php");

# BOARD
define("BOARD_ADD",        ENDPOINTS_URL . "board_add.php");
define("BOARD_DEL",        ENDPOINTS_URL . "board_del.php");
define("BOARD_ADD_USER",   ENDPOINTS_URL . "board_addUser.php");
define("BOARD_DEL_USER",   ENDPOINTS_URL . "board_delUser.php");
define("BOARDS",           ENDPOINTS_URL . "boards.php");

# POSTS
define("POST_ADD",         ENDPOINTS_URL . "post_add.php");
define("POST_DEL",         ENDPOINTS_URL . "post_del.php");
define("POST_EDIT",        ENDPOINTS_URL . "post_edit.php");
define("POSTS",            ENDPOINTS_URL . "posts.php");

# TASKS
define("TASK_ADD",         ENDPOINTS_URL . "task_add.php");
define("TASK_DEL",         ENDPOINTS_URL . "task_del.php");
define("TASK_EDIT",        ENDPOINTS_URL . "task_edit.php");
define("TASKS",            ENDPOINTS_URL . "tasks.php");