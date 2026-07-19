<?php

namespace Controller;

use Model\ChannelModel;
use Model\Entity\Post;
use Model\PostModel;

final class PostController extends Controller {

    public function showPosts(): void
    {
        $model = new PostModel();
        $channelModel = new ChannelModel();

        $channelId = $_GET['id'];

        if (!$channelModel->isUserInChannel($this->getSessionUser()->getId(), $channelId)) {
            $this->redirect('channels.php?message=Sem permissao');
        }

        $data = $model->selectAll($channelId);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
        $data = Post::fromCollection($data);

        $channel = $channelModel->selectOne($channelId);
        $users = $channelModel->selectUsersInChannel($channelId);

        $this->loadView('posts', [
            'posts' => $data,
            'channel' => $channel,
            'users' => $users,
            'userId' => $this->getSessionUser()->getId()
        ]);
    }
    
    public function addPost(): void
    {
        date_default_timezone_set('America/Sao_Paulo');
        $model = new PostModel();
        $channelModel = new ChannelModel();

        $model->insert(new Post(
            null, 
            $_POST['title'], 
            $_POST['content'], 
            date("Y-m-d"), 
            $this->getSessionUser(), 
            $channelModel->selectOne($_POST['channel_id'])
        ));

        $this->redirect('posts.php?id='.$_POST['channel_id']);
    }

    public function updatePost(): void
    {
        // Se for exclusao redireciona
        if (isset($_POST['deletePost'])) { 
            $this->redirect('post_del.php?id='.$_POST['id'].
                            '&channel_id='.$_POST['channel_id']); 
        }

        if (empty($_POST['title']) || empty($_POST['content'])) { 
            $this->redirect('posts.php?id='.$_POST['channel_id'].
                            '&message=Preencha os campos obrigatorios.'); 
        }
        
        date_default_timezone_set('America/Sao_Paulo');
        $model = new PostModel();
        $channelModel = new ChannelModel();

        $model->update(new Post(
            $_POST['id'], 
            $_POST['title'], 
            $_POST['content'], 
            date("Y-m-d"),
            $this->getSessionUser(),
            $channelModel->selectOne($_POST['channel_id'])
        ));

        $this->redirect('posts.php?id='.$_POST['channel_id']);
    }

    public function deletePost(): void
    {
        $model = new PostModel();

        $model->delete($_GET['id']);
        $this->redirect('posts.php?id='.$_GET['channel_id']);
    }
    
}