<?php

namespace Model;

use Model\VO\taskVO;

final class TaskModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY task_deadline ASC";
        $data = $db->select($query,  [':user_id' => $vo->getId()]);

        $arrayDados = [];
        
        foreach ($data as $row) {
            array_push($arrayDados, new TaskVO (
                $row['id'], 
                $row['task_title'], 
                $row['task_description'], 
                $row['task_deadline'], 
                $row['user_id'],
                $row['is_checked']
            ));
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        // ...
    }
    
    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO tasks (
                              task_title, 
                              task_description, 
                              task_deadline, 
                              user_id, 
                              is_checked) 
                       VALUES (:task_title, 
                              :task_description, 
                              :task_deadline, 
                              :user_id, 
                              :is_checked)";
        $binds = [
            ':task_title' => $vo->getTitle(), 
            ':task_description' => $vo->getDescription(), 
            ':task_deadline' => $vo->getDeadline(), 
            ':user_id' => $vo->getUserId(),
            ':is_checked' => $vo->getIsChecked()
        ];
     
        $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE tasks 
                     SET task_title = :task_title, 
                         task_description = :task_description, 
                         task_deadline = :task_deadline, 
                         is_checked = :is_checked 
                   WHERE id = :id";
        $binds = [
            ':task_title' => $vo->getTitle(), 
            ':task_description' => $vo->getDescription(), 
            ':task_deadline' => $vo->getDeadline(), 
            ':is_checked' => $vo->getIsChecked(),
            ':id' => $vo->getId()
        ];
        
        $db->execute($query, $binds);
        
    }
    
    public function delete($vo) {
        $db = new Database();
        $db->execute("DELETE FROM tasks WHERE id = :id", [':id' => $vo->getId()]);
    }
}