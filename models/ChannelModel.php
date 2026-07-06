<?php

namespace Model;

use Model\VO\Channel_userVO;
use Model\VO\ChannelVO;
use Model\VO\UserVO;

final class ChannelModel {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT c.id, c.channel_name, c.channel_description, c.channel_owner
                    FROM channels AS c
                    JOIN channel_user AS cu
                      ON c.id = cu.channel_id
                   WHERE cu.user_id = :id";

        $data = $db->select($query, [':id' => $vo->getId()]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new ChannelVO(
                $row['id'], 
                $row['channel_name'], 
                $row['channel_description'], 
                $row['channel_owner']
            ));
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT c.id, c.channel_name, c.channel_description, c.channel_owner
                    FROM channels AS c
                   WHERE c.id = :id";

        $data = $db->select($query, [':id' => $vo->getId()]);

        return new ChannelVO(
            $data[0]['id'], 
            $data[0]['channel_name'], 
            $data[0]['channel_description'], 
            $data[0]['channel_owner']
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT 
                    INTO channels(channel_name, channel_description, channel_owner) 
                  VALUES (:channel_name, :channel_description, :channel_owner)";
        
        $binds = [
            ':channel_name' => $vo->getName(), 
            ':channel_description' => $vo->getDescription(), 
            ':channel_owner' => $vo->getOwner()
        ];

        $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE channels 
                     SET channel_name = :channel_name, 
                         channel_description = :channel_description, 
                         channel_owner = :channel_owner
                   WHERE id = :id";

        $binds = [
            ':channel_name' => $vo->getName(), 
            ':channel_description' => $vo->getDescription(), 
            ':channel_owner' => $vo->getOwner(), 
            ':id' => $vo->getId()
        ];
        
        $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM channels WHERE id = :id";

        $db->execute($query, [':id' => $vo->getId()]);
    }

    public function selectUsersInChannel($vo) {
        $db = new Database();
        $query = "SELECT u.user_name
                    FROM channel_user AS cu
                    JOIN users AS u
                      ON u.id = cu.user_id
                   WHERE cu.channel_id = :channel_id";
        
        $data = $db->select($query, [':channel_id' => $vo->getId()]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new UserVO(
                '', 
                $row['user_name'], 
            ));
        }

        return $arrayDados;
    }

    public function isUserInChannel($vo) {
        $db = new Database();
        $query = "SELECT * 
                    FROM channel_user 
                   WHERE channel_id = :channel_id 
                     AND user_id = :user_id";

        $data = $db->select($query, [
            ':channel_id' => $vo->getChannelId(), 
            ':user_id' => $vo->getUserId()
        ]);

        $arrayDados = [];
        foreach ($data as $row) {
            array_push($arrayDados, new Channel_userVO(
                $row['channel_id'], 
                $row['user_id'], 
            ));
        }

        return empty($arrayDados) ? false : true;
    }

    public function addUserToChannel($vo) {
        $db = new Database();
        $query = "INSERT 
                    INTO channel_user(channel_id, user_id) 
                  VALUES (:channel_id, :user_id)";

        $binds = [
            ':channel_id' => $vo->getChannelId(), 
            ':user_id' => $vo->getUserId()
        ];

        $db->execute($query, $binds);
    }

    public function deleteUserFromChannel($vo) {
        $db = new Database();
        $query = "DELETE 
                    FROM channel_user 
                   WHERE channel_id = :channel_id 
                     AND user_id = :user_id";

        $binds = [
            ':channel_id' => $vo->getChannelId(), 
            ':user_id' => $vo->getUserId()
        ];

        $db->execute($query, $binds);
    }
    
    public function lastId() {
        $db = new Database();
        $query = "SELECT id 
                    FROM channels 
                   ORDER BY id DESC LIMIT 1";

        $data = $db->select($query);

        return $data[0][0];
    }
    
}