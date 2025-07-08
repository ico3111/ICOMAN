<?php

namespace Controller;

use Model\ChannelModel;
use Model\UserModel;
use Model\VO\Channel_userVO;
use Model\VO\ChannelVO;
use Model\VO\UserVO;

final class ChannelController extends Controller {

    public function showChannels() {
        $model = new ChannelModel();
        $userModel = new UserModel();
        $data = $model->selectAll(new ChannelVO($this->getUserId()));

        $channels = [];
        foreach ($data as $channel) {
            $c = $channel->setOwnerName(
                $userModel->selectOneId(
                    new UserVO($channel->getOwner())
                )->getUsername()
            );
            array_push($channels, $c);
        }

        $this->loadView('channels', ['channels' => $data]);
    }

    public function addChannel() {
        $model = new ChannelModel();
        $model->insert(new ChannelVO('', $_POST['name'], $_POST['description'], $this->getUserId()));
        $lastId = $model->lastId()+1;
        $this->addUserToChannel(new Channel_userVO($lastId, $this->getUserId()));
        $this->redirect('channels.php');
    }

    public function updateChannel() {
        // ...
    }

    public function deleteChannel() {
        $model = new ChannelModel();
        $model->delete(new ChannelVO($_GET['id']));
        $this->redirect('channels.php');
    }

    public function showUsersInChannel() {
        $model = new ChannelModel();
        $userModel = new UserModel();
        $userId = $userModel->selectOne(new UserVO('', $_POST['user_name']))->getId();

        $model->addUserToChannel(new Channel_userVO($_POST['channel_id'], $userId));
        $this->redirect('posts.php?id='. $_POST['channel_id']);
    }

    public function addUserToChannel($vo = '') {
        $model = new ChannelModel();
        
        $userId = 0;
        $channelId = 0;
        $redirect = '';
        if (empty($vo)) {
            $userModel = new UserModel();
            $userId = $userModel->selectOne(new UserVO('', $_POST['user_name']))->getId();
            $channelId = $_POST['channel_id'];
            $redirect = $_POST['channel_id'];
        } else {   
            $channelId = $vo->getChannelId();
            $userId = $vo->getUserId();
        } 

        $model->addUserToChannel(new Channel_userVO($channelId, $userId));
        $this->redirect('posts.php?id='. $redirect);
    }
    
    public function removeUserFromChannel() {
        $model = new ChannelModel();
        $userModel = new UserModel();
        $userId = $userModel->selectOne(new UserVO('', $_POST['user_name']))->getId();

        $model->deleteUserFromChannel(new Channel_userVO($_POST['channel_id'], $userId));
        $this->redirect('posts.php?id='. $_POST['channel_id']);
    }

}