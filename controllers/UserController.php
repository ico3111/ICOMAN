<?php

namespace Controller;

use Exception;
use Model\Entity\User;
use Model\UserModel;

class UserController extends Controller {
   
    public function showHome(): void
    {
        $this->loadView('home');
    }

    public function showLogin(): void
    {
        $this->loadView('login');
    }

    public function showRegister(): void
    {
        $this->loadView('register');
    }

    public function doLogin(): void
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (empty($login) || empty($password)) { 
            $this->redirect('login.php?message=Preencha todos os campos.'); 
        }

        $model = new UserModel();
        $user = $model->selectLogin($login);

        if (empty($user)) { 
            $this->redirect('login.php?message=Nenhum usuario foi encontrado.'); 
        }

        if (!password_verify($password, $user->getPassword())) { 
            $this->redirect('login.php?message=Senha incorreta'); 
        }

        session_start();
        $_SESSION['user'] = $user;
        $this->redirect('home.php?message=Login feito com sucesso. Bem-vindo, '. $this->getSessionUser()->getUsername() .'!');
    }

    public function doRegister(): void
    {
        $login           = $_POST['login'];
        $password        = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        $adminPassword   = $_POST['admin_password'];

        if (empty($login) || 
            empty($password) || 
            empty($confirmPassword) || 
            empty($adminPassword)) { 
            $this->redirect('register.php?message=Preencha todos os campos.'); 
        }

        if ($password != $confirmPassword) { 
            $this->redirect('register.php?message=As senhas não estão iguais.'); 
        }

        $model = new UserModel();
        try {
            $admin = $model->selectOne(ADMIN_ID);
            if (!password_verify($adminPassword, $admin->getPassword())) { 
                $this->redirect('register.php?message=Sem a permissao do administrador.'); 
            }
            
            $model->insert(new User(null, $login, password_hash($password, PASSWORD_DEFAULT)));
        } catch (Exception $e) {
            $this->redirect('register.php?error=Algo de errado ao cadastrar seu usuario.');
        }

        $this->redirect('login.php?message=Usuario cadastrado com sucesso! Agora faça login.');
    }
}