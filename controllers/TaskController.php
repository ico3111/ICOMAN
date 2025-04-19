<?php

namespace Controller;

use Model\TaskModel;
use Model\VO\TaskVO;

final class TaskController extends Controller {

    public function showTasks() {
        $model = new TaskModel();
        $data = $model->selectAll(new TaskVO($this->getUserId()));
        $this->loadView('tasks', ['tasks' => $data]);
    }
    
    public function addTask() {
        
        if (empty($_POST['title']) || empty($_POST['deadline'])) { $this->redirect('tasks.php?Preencha os campos obrigatorios.'); }

        $model = new TaskModel();
        try {
            $model->insert(new TaskVO('', $_POST['title'], $_POST['description'], $_POST['deadline'], $this->getUserId()));
        } catch (Exception $e) {
            $this->redirect('tasks.php?Algo deu errado ao adicionar a task.');
        }

        $this->redirect('tasks.php?message=Task adicionada com sucesso');

    }

    public function updateTask() {
        if (isset($_POST['deleteTask'])) { $this->redirect('task_del.php?id='.$_POST['id']); }
        if (empty($_POST['title']) || empty($_POST['deadline'])) { $this->redirect('tasks.php?message=Preencha os campos obrigatorios.'); }

        $model = new TaskModel();
        $model->update(new TaskVO($_POST['id'], $_POST['title'], $_POST['description'], $_POST['deadline'], $_POST['user_id']));
        $this->redirect('tasks.php');
        
    }

    public function deleteTask() {
        if (!isset($_GET['id'])) { $this->redirect('tasks.php?error=Algo deu errado.'); }

        $model = new TaskModel();
        $model->delete(new TaskVO($_GET['id']));
        $this->redirect('tasks.php?message=Task deletada com sucesso.');
    }
}