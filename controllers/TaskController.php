<?php

namespace Controller;

use Exception;
use Model\BoardModel;
use Model\TaskModel;
use Model\UserModel;
use Model\VO\Board_userVO;
use Model\VO\BoardVO;
use Model\VO\TaskVO;
use Model\VO\UserVO;

final class TaskController extends Controller {

    public function showTasks() {
        $model = new TaskModel();
        $boardModel = new BoardModel();
        $userModel = new UserModel();

        if (!$boardModel->isUserInBoard(new Board_userVO($_GET['id'], $this->getUserId()))) {
            $this->redirect('boards.php?message=Sem permissao');
        }

        $data = $model->selectAll(new TaskVO(
            '',
            '',
            '',
            '',
            '',
            $_GET['id']
        ));
        
        $board = $boardModel->selectOne(new BoardVO($_GET['id']));
        $board->setOwnerName(
            $userModel->selectOneId(
                new UserVO($board->getOwner())
            )->getUsername()
        );

        $users = $boardModel->selectUsersInBoard(new BoardVO($_GET['id']));

        $this->loadView('tasks', [
            'tasks' => $data,
            'board' => $board,
            'users' => $users,
            'userId' => $this->getUserId()
        ]);
        
    }
    
    public function addTask() {

        if (empty($_POST['title']) || empty($_POST['deadline'])) { 
            $this->redirect('tasks.php?message=Preencha os campos obrigatorios.');
        }
        
        $model = new TaskModel();
        try {
            $model->insert(new TaskVO(
                '', 
                $_POST['title'], 
                $_POST['description'], 
                $_POST['deadline'], 
                $this->getUserId(),
                $_POST['board_id'],
                $_POST['isChecked']
            ));
        } catch (Exception $e) {
            $this->redirect('tasks.php?message=Algo deu errado ao adicionar a task&id='.$_POST['board_id']);
        }
        $this->redirect('tasks.php?message=Task adicionada com sucesso&id='.$_POST['board_id']);

    }

    public function updateTask() {
        if (isset($_POST['deleteTask'])) { $this->redirect('task_del.php?board_id='.$_POST['board_id'].'&id='.$_POST['id']); }
        if (empty($_POST['title']) || empty($_POST['deadline'])) { $this->redirect('tasks.php?message=Preencha os campos obrigatorios.'); }

        $model = new TaskModel();
        $model->update(new TaskVO(
            $_POST['id'], 
            $_POST['title'], 
            $_POST['description'], 
            $_POST['deadline'], 
            $this->getUserId(),
            $_POST['board_id'],
            $_POST['isChecked']
        ));
        $this->redirect('tasks.php?id='.$_POST['board_id']);
    }

    public function deleteTask() {
        if (!isset($_GET['id'])) { $this->redirect('boards.php?error=Algo deu errado.'); }

        $model = new TaskModel();
        $model->delete(new TaskVO($_GET['id']));
        $this->redirect('tasks.php?id='.$_GET['board_id'].'message=Task deletada com sucesso.');
    }
}