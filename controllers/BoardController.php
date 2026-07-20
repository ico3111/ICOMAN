<?php

namespace Controller;

use Model\BoardModel;
use Model\Entity\Board;
use Model\UserModel;

final class BoardController extends Controller
{
    public function showBoards(): void
    {
        $boardModel = new BoardModel();

        $data = $boardModel->selectAll($this->getSessionUser()->getId());

        $this->loadView('boards', [
            'boards' => $data,
            'user' => $this->getSessionUser()->getUsername()
        ]);
    }

    public function addBoard(): void
    {
        $model = new BoardModel();

        $model->insert(
            new Board(null, $_POST['name'], $_POST['description'], $this->getSessionUser())
        );

        $lastId = $model->lastId("boards");

        $model->addUserToBoard($this->getSessionUser()->getId(), $lastId);
        $this->redirect('boards.php');
    }

    public function updateBoard(): void
    {
        // ...
    }

    public function deleteBoard(): void
    {
        $model = new BoardModel();

        $model->delete($_GET['id']);
        $this->redirect('boards.php');
    }

    public function showUsersInBoard(): void
    {
        // ...
    }

    public function addUserToBoard(): void
    {
        $model = new BoardModel();
        $userModel = new UserModel();

        $userId = $userModel->selectLogin($_POST['user_name'])->getId();

        $model->addUserToBoard($userId, $_POST['board_id']);
        $this->redirect('tasks.php?id=' . $_POST['board_id']);
    }

    public function removeUserFromBoard(): void
    {
        $model = new BoardModel();
        $userModel = new UserModel();

        $name = isset($_GET['user']) ? $_GET['user'] : $_POST['user_name'];
        $board = isset($_GET['board']) ? $_GET['board'] : $_POST['board_id'];

        $userId = $userModel->selectLogin($name)->getId();
        $model->deleteUserFromBoard($userId, $board);

        $this->redirect('tasks.php?id=' . $board);
    }
}