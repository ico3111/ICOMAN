<?php

namespace Controller;

use Model\UserModel;
use Model\VO\UserVO;

class UserController extends Controller {
   
    public function showHome() {
        $message = $_GET['message'] ?? null;
        $error = $_GET['error'] ?? null;
        $this->loadView('home', ['message' => $message, 'error' => $error]);
    }

    public function showLogin() {
        $message = $_GET['message'] ?? null;
        $error = $_GET['error'] ?? null;
        $this->loadView('login', ['message' => $message, 'error' => $error]);
    }

    public function showRegister() {
        $message = $_GET['message'] ?? null;
        $error = $_GET['error'] ?? null;
        $this->loadView('register', ['message' => $message, 'error' => $error]);
    }

    public function doLogin() {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (empty($login) || empty($password)) { $this->redirect('login.php?message=Preencha todos os campos.'); }

        $model = new UserModel();
        $user = $model->selectOne(new UserVO('', $login));

        if (empty($user)) { $this->redirect('login.php?message=Nenhum usuario foi encontrado.'); }

        if (!password_verify($password, $user->getPassword())) { $this->redirect('login.php?message=Senha incorreta'); }

        session_start();
        $_SESSION['user'] = $user;
        $this->redirect('home.php?message=Login feito com sucesso. Bem-vindo,'. $this->getUserName());
    }

    public function doRegister() {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if (empty($login) || empty($password) || empty($confirmPassword)) { $this->redirect('register.php?message=Preencha todos os campos.'); }
        if ($password != $confirmPassword) { $this->redirect('register.php?message=As senhas não estão iguais.'); }

        try {
            $model = new UserModel();
            $model->insert(new UserVO('', $login, password_hash($password, PASSWORD_DEFAULT)));
        } catch (Exception $e) {
            $this->redirect('register.php?error=Algo de errado ao cadastrar seu usuario.');
        }

        $this->redirect('login.php?message=Usuario cadastrado com sucesso! Agora faça login.');
    }

}