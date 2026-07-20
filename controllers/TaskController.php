<?php

namespace Controller;

use Model\BoardModel;
use Model\Entity\Task;
use Model\TaskModel;

final class TaskController extends Controller
{
    public function showTasks(): void
    {
        $taskModel = new TaskModel();
        $boardModel = new BoardModel();

        $boardId = $_GET['id'];

        if (!$boardModel->isUserInBoard($this->getSessionUser()->getId(), $boardId)) {
            $this->redirect('boards.php?message=Sem permissao');
        }

        $data = $taskModel->selectAll($boardId);
        $board = $boardModel->selectOne($boardId);
        $users = $boardModel->selectUsersInBoard($boardId);


        $this->loadView('tasks', [
            'tasks' => $data,
            'board' => $board,
            'users' => $users,
            'userId' => $this->getSessionUser()->getId()
        ]);
    }

    public function addTask(): void
    {
        if (empty($_POST['title']) || empty($_POST['deadline'])) {
            $this->redirect('tasks.php?id='.$_POST['board_id'].'&message=Preencha os campos obrigatorios.');
        }

        $taskModel = new TaskModel();
        $boardModel = new BoardModel();

        $taskModel->insert(new Task(
            null,
            $_POST['title'],
            $_POST['description'],
            $_POST['deadline'],
            isset($_POST['isChecked']),
            $this->getSessionUser(),
            $boardModel->selectOne($_POST['board_id'])
        ));

        $this->redirect('tasks.php?id=' . $_POST['board_id']);
    }

    public function updateTask(): void
    {
        if (isset($_POST['deleteTask'])) {
            $this->redirect(
                'task_del.php?id=' . $_POST['id'] .
                '&board_id=' . $_POST['board_id']
            );
        }

        if (empty($_POST['title']) || empty($_POST['deadline'])) {
            $this->redirect(
                'tasks.php?id=' . $_POST['board_id'] .
                '&message=Preencha os campos obrigatorios.'
            );
        }

        $taskModel = new TaskModel();
        $boardModel = new BoardModel();

        $taskModel->update(new Task(
            $_POST['id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['deadline'],
            isset($_POST['isChecked']),
            $this->getSessionUser(),
            $boardModel->selectOne($_POST['board_id'])
        ));

        $this->redirect('tasks.php?id=' . $_POST['board_id']);
    }

    public function deleteTask(): void
    {
        $taskModel = new TaskModel();

        $taskModel->delete($_GET['id']);

        $this->redirect('tasks.php?id=' . $_GET['board_id']);
    }
}