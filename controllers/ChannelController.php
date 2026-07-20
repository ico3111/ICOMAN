<?php

namespace Controller;

use Model\ChannelModel;
use Model\Entity\Channel;
use Model\UserModel;

final class ChannelController extends Controller 
{
    public function showChannels(): void
    {
        $channelModel = new ChannelModel();

        $data = $channelModel->selectAll($this->getSessionUser()->getId());

        $this->loadView('channels', [
            'channels' => $data,
            'user' => $this->getSessionUser()->getUsername()
        ]);
    }

    public function addChannel(): void
    {
        $model = new ChannelModel();

        $model->insert(
            new Channel(null, $_POST['name'], $_POST['description'], $this->getSessionUser())
        );

        $lastId = $model->lastId("channels");

        $model->addUserToChannel($this->getSessionUser()->getId(), $lastId);
        $this->redirect('channels.php');
    }

    public function updateChannel(): void
    {
        // ...
    }

    public function deleteChannel(): void
    {
        $model = new ChannelModel();

        $model->delete($_GET['id']);
        $this->redirect('channels.php');
    }

    public function showUsersInChannel(): void
    {
        // ...
    }

    public function addUserToChannel(): void 
    {
        $model = new ChannelModel();
        $userModel = new UserModel();

        $userId = $userModel->selectLogin($_POST['user_name'])->getId();

        $model->addUserToChannel($userId, $_POST['channel_id']);
        $this->redirect('posts.php?id='. $_POST['channel_id']);
    }
    
    public function removeUserFromChannel(): void
    {
        $model = new ChannelModel();
        $userModel = new UserModel();

        $name = isset($_GET['user']) ? $_GET['user'] : $_POST['user_name'];
        $channel = isset($_GET['channel']) ? $_GET['channel'] : $_POST['channel_id'];

        $userId = $userModel->selectLogin($name)->getId();
        $model->deleteUserFromChannel($userId, $channel);
        
        $this->redirect('posts.php?id='. $channel);
    }
}