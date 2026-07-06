<?php

namespace Model;

use Model\VO\board_userVO;
use Model\VO\BoardVO;
use Model\VO\UserVO;

final class BoardModel {

    public function selectAll($vo) {
        $db = new Database();     
        $query = "SELECT boards.id, boards.board_name, boards.board_description, boards.board_owner
                    FROM boards
                    JOIN board_user
                      ON boards.id = board_user.board_id
                   WHERE board_user.user_id = :id";

        $data = $db->select($query, [':id' => $vo->getId()]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new BoardVO(
                $row['id'], 
                $row['board_name'], 
                $row['board_description'], 
                $row['board_owner']
            ));
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT boards.id, boards.board_name, boards.board_description, boards.board_owner
                    FROM boards
                   WHERE boards.id = :id";

        $data = $db->select($query, [':id' => $vo->getId()]);

        $board = new BoardVO(
            $data[0]['id'], 
            $data[0]['board_name'], 
            $data[0]['board_description'], 
            $data[0]['board_owner']
        );

        return $board;
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT 
                    INTO boards(board_name, board_description, board_owner) 
                  VALUES (:board_name, :board_description, :board_owner)";
        
        $binds = [
            ':board_name' => $vo->getName(), 
            ':board_description' => $vo->getDescription(), 
            ':board_owner' => $vo->getOwner()
        ];

        $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE boards 
                     SET board_name = :board_name, 
                         board_description = :board_description, 
                         board_owner = :board_owner
                   WHERE id = :id";

        $binds = [
            ':board_name' => $vo->getName(), 
            ':board_description' => $vo->getDescription(), 
            ':board_owner' => $vo->getOwner(), 
            ':id' => $vo->getId()
        ];
        
        $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM boards WHERE id = :id";

        $db->execute($query, [':id' => $vo->getId()]);
    }

    public function selectUsersInBoard($vo) {
        $db = new Database();
        $query = "SELECT board_user.user_name
                    FROM board_user
                    JOIN users
                      ON users.id = board_user.user_id
                   WHERE board_user.board_id = :board_id";
        
        $data = $db->select($query, [':board_id' => $vo->getId()]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new UserVO(
                '', 
                $row['user_name'], 
            ));
        }

        return $arrayDados;
    }

    public function isUserInBoard($vo) {
        $db = new Database();
        $query = "SELECT * 
                    FROM board_user 
                   WHERE board_id = :board_id 
                     AND user_id = :user_id";

        $data = $db->select($query, [
            ':board_id' => $vo->getBoardId(), 
            ':user_id' => $vo->getUserId()
        ]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new board_userVO(
                $row['board_id'], 
                $row['user_id'], 
            ));
        }

        return empty($arrayDados) ? false : true;
    }

    public function addUserToBoard($vo) {
        $db = new Database();
        $query = "INSERT 
                    INTO board_user(board_id, user_id) 
                  VALUES (:board_id, :user_id)";

        $binds = [
            ':board_id' => $vo->getBoardId(), 
            ':user_id' => $vo->getUserId()
        ];

        $db->execute($query, $binds);
    }

    public function deleteUserFromBoard($vo) {
        $db = new Database();
        $query = "DELETE 
                    FROM board_user 
                   WHERE board_id = :board_id 
                     AND user_id = :user_id";

        $binds = [
            ':board_id' => $vo->getBoardId(), 
            ':user_id' => $vo->getUserId()
        ];

        $db->execute($query, $binds);
    }
    
    public function lastId() {
        $db = new Database();
        $query = "SELECT id 
                    FROM boards 
                   ORDER BY id DESC LIMIT 1";
        $data =$db->select($query);
        return $data[0][0];
    }
    
}
