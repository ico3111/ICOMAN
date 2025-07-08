<?php

namespace Controller;

use Model\ChannelModel;
use Model\PostModel;
use Model\UserModel;
use Model\VO\Channel_userVO;
use Model\VO\ChannelVO;
use Model\VO\PostVO;
use Model\VO\UserVO;

final class PostController extends Controller {

    public function showPosts() {
        $model = new PostModel();
        $channelModel = new ChannelModel();
        $userModel = new UserModel();

        if (!$channelModel->isUserInChannel(new Channel_userVO($_GET['id'], $this->getUserId()))) {
            $this->redirect('channels.php?message=Sem permissao');
        }

        $data = $model->selectAll(new PostVO(
            '',
            '',
            '',
            '',
            '',
            $_GET['id']
        ));
        
        $channel = $channelModel->selectOne(new ChannelVO($_GET['id']));
        $channel->setOwnerName(
            $userModel->selectOneId(
                new UserVO($channel->getOwner())
            )->getUsername()
        );

        $this->loadView('posts', [
            'posts' => $data,
            'channel' => $channel,
            'userId' => $this->getUserId()
        ]);
    }
    
    public function addPost() {
        date_default_timezone_set('America/Sao_Paulo');
        $model = new PostModel();
        $model->insert(new PostVO(
            '', 
            $_POST['title'], 
            $_POST['content'], 
            date("Y-m-d"), 
            $this->getUserId(), 
            $_POST['channel_id'],
            $this->getUsername()
        ));
        $this->redirect('posts.php?id='.$_POST['channel_id']);
    }

    public function updatePost() {
        if (isset($_POST['deletePost'])) { $this->redirect('post_del.php?id='.$_POST['id'].'&channel_id='.$_POST['channel_id']); }
        if (empty($_POST['title']) || empty($_POST['content'])) { $this->redirect('posts.php?message=Preencha os campos obrigatorios.'); }
        
        date_default_timezone_set('America/Sao_Paulo');
        $model = new PostModel();
        $model->update(new PostVO($_POST['id'], $_POST['title'], $_POST['content'], date("Y-m-d")));
        $this->redirect('posts.php?id='.$_POST['channel_id']);
    }

    public function deletePost() {
        $model = new PostModel();
        $model->delete(new PostVO($_GET['id']));
        $this->redirect('posts.php?id='.$_GET['channel_id']);
    }
    
}