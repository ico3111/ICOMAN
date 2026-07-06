<?php

namespace Model;

use Model\VO\UserVO;

final class UserModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT id, user_name, user_password
                    FROM users
                   WHERE id = :id";

        $data = $db->select($query, [':id' => $vo->getId()]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new UserVO(
                $row['id'], 
                $row['user_name'], 
                $row['user_password']
            ));
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT id, user_name, user_password
                    FROM users
                   WHERE user_name = :user_name";

        $data = $db->select($query, [':user_name' => $vo->getUsername()]);

        return new UserVO(
            $data[0]['id'], 
            $data[0]['user_name'], 
            $data[0]['user_password']
        );
    }

    public function selectOneId($vo) {
        $db = new Database();
        $query = "SELECT id, user_name, user_password
                    FROM users
                   WHERE id = :id";

        $data = $db->select($query, [':id' => $vo->getId()]);

        return new UserVO(
            $data[0]['id'], 
            $data[0]['user_name'], 
            $data[0]['user_password']
        );
    }
    
    public function insert($vo) {
        $db = new Database();
        $query = "INSERT 
                    INTO users(user_name, user_password) 
                  VALUES (:user_name, :user_password)";
        
        $binds = [
            ':user_name' => $vo->getUsername(), 
            ':user_password' => $vo->getPassword()
        ];

        $db->execute($query, $binds);
    }
    
    public function update($vo) {
        // ...
    }
    
    public function delete($vo) {
        // ...
    }
    
}