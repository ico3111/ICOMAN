<?php

namespace Controller;

use Model\PostModel;
use Model\VO\PostVO;

final class PostController extends Controller {

    public function showPosts() {
        $model = new PostModel();
        $data = $model->selectAll(new PostVO($this->getUserId()));
        $this->loadView('posts', ['posts' => $data]);
    }
    
    public function addPost() {
        date_default_timezone_set('America/Sao_Paulo');
        $model = new PostModel();
        $model->insert(new PostVO('', $_POST['title'], $_POST['content'], date("Y-m-d"), $this->getUserId(), $this->getUsername()));
        $this->redirect('posts.php');
    }

    public function updatePost() {
        if (isset($_POST['deletePost'])) { $this->redirect('post_del.php?id='.$_POST['id']); }
        if (empty($_POST['title']) || empty($_POST['content'])) { $this->redirect('posts.php?message=Preencha os campos obrigatorios.'); }
        
        date_default_timezone_set('America/Sao_Paulo');
        $model = new PostModel();
        $model->update(new PostVO($_POST['id'], $_POST['title'], $_POST['content'], date("Y-m-d")));
        $this->redirect('posts.php');
    }

    public function deletePost() {
        $model = new PostModel();
        $model->delete(new PostVO($_GET['id']));
        $this->redirect('posts.php');
    }
    
}