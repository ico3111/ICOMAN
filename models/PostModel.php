<?php

namespace Model;

use Model\VO\PostVO;

final class PostModel {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM posts WHERE user_id = :id";
        $data = $db->select($query, [':id' => $vo->getId()]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new PostVO($row['id'], $row['post_title'], $row['post_content'], $row['post_date'], $row['user_id'], $row['user_name']));
        }

        return $arrayDados;
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO posts(post_title, post_content, post_date, user_id, user_name) VALUES (:post_title, :post_content, :post_date, :user_id, :user_name)";
        $binds = [
            ':post_title' => $vo->getTitle(), 
            ':post_content' => $vo->getContent(), 
            ':post_date' => $vo->getDate(),
            ':user_id' => $vo->getUserId(),
            ':user_name' => $vo->getUserName(),
        ];

        $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE posts 
                     SET post_title = :post_title, 
                         post_content = :post_content, 
                         post_date = :post_date
                   WHERE id = :id";
        $binds = [
            ':post_title' => $vo->getTitle(), 
            ':post_content' => $vo->getContent(), 
            ':post_date' => $vo->getDate(), 
            ':id' => $vo->getId()
        ];
        
        $db->execute($query, $binds);
        
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM posts WHERE id = :id";
        $db->execute($query, [':id' => $vo->getId()]);
    }
}
