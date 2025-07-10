<?php

namespace Controller;

use Model\BoardModel;
use Model\UserModel;
use Model\VO\Board_userVO;
use Model\VO\BoardVO;
use Model\VO\UserVO;

final class BoardController extends Controller {

    public function showBoards() {
        $model = new BoardModel();
        $userModel = new UserModel();
        $data = $model->selectAll(new BoardVO($this->getUserId()));

        $boards = [];
        foreach ($data as $board) {
            $c = $board->setOwnerName(
                $userModel->selectOneId(
                    new UserVO($board->getOwner())
                )->getUsername()
            );
            array_push($boards, $c);
        }

        $this->loadView('boards', [
            'boards' => $data,
            'user' => $this->getUserName()
        ]);
    }

    public function addBoard() {
        $model = new BoardModel();
        $model->insert(new BoardVO('', $_POST['name'], $_POST['description'], $this->getUserId()));
        $lastId = $model->lastId();
        $this->addUserToBoard(new Board_userVO($lastId, $this->getUserId()));
        $this->redirect('boards.php');
    }

    public function updateBoard() {
        // ...
    }

    public function deleteBoard() {
        $model = new BoardModel();
        $model->delete(new BoardVO($_GET['id']));
        $this->redirect('boards.php');
    }

    public function showUsersInBoard() {
        // ...
    }

    public function addUserToBoard($vo = '') {
        $model = new BoardModel();
        
        $isRequestFromPost = false;
        $userId = 0;
        $boardId = 0;
        if (empty($vo)) {
            $userModel = new UserModel();
            $isRequestFromPost = true;
            $userId = $userModel->selectOne(new UserVO('', $_POST['user_name']))->getId();
            $boardId = $_POST['board_id'];
        } else {   
            $boardId = $vo->getBoardId();
            $userId = $vo->getUserId();
        } 

        $model->addUserToBoard(new Board_userVO($boardId, $userId));
        if ($isRequestFromPost) {
            $this->redirect('tasks.php?id='. $_POST['board_id']);
        } else {
            $this->redirect('boards.php');
        }

    }
    
    public function removeUserFromBoard() {
        $model = new BoardModel();
        $userModel = new UserModel();

        $isRequestFromPost = false;
        $name = '';
        $board = 0;
        if (isset($_POST['user_name']) && $_POST['board_id']) {
            $isRequestFromPost = true;
            $name = $_POST['user_name'];
            $board = $_POST['board_id'];
        } else {
            $name = $_GET['user'];
            $board = $_GET['board'];
        }

        $userId = $userModel->selectOne(new UserVO('', $name))->getId();
        $model->deleteUserFromBoard(new Board_userVO($board, $userId));

        if ($isRequestFromPost) {
            $this->redirect('tasks.php?id='. $_POST['board_id']);
        } else {
            $this->redirect('boards.php');
        }
        
    }

}