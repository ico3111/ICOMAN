<?php

namespace Model;

use Model\VO\taskVO;

final class TaskModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM tasks WHERE user_id = :user_id";
        $data = $db->select($query,  [':user_id' => $vo->getId()]);

        $arrayDados = [];
        
        foreach ($data as $row) {
            array_push($arrayDados, new TaskVO($row['id'], $row['task_title'], $row['task_description'], $row['task_deadline'], $row['user_id']));
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        // ...
    }
    
    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO tasks (task_title, task_description, task_deadline, user_id) VALUES (:task_title, :task_description, :task_deadline, :user_id)";
        $binds = [
            ':task_title' => $vo->getTitle(), 
            ':task_description' => $vo->getDescription(), 
            ':task_deadline' => $vo->getDeadline(), 
            ':user_id' => $vo->getUserId()
        ];
     
        $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE tasks SET task_title = :task_title, task_description = :task_description, task_deadline = :task_deadline WHERE id = :id";
        $binds = [
            ':task_title' => $vo->getTitle(), 
            ':task_description' => $vo->getDescription(), 
            ':task_deadline' => $vo->getDeadline(), 
            ':id' => $vo->getId()
        ];
        
        $db->execute($query, $binds);
        
    }
    
    public function delete($vo) {
        $db = new Database();
        $db->execute("DELETE FROM tasks WHERE id = :id", [':id' => $vo->getId()]);
    }
}