<?php

namespace Model;

use Model\Entity\Channel;
use Model\VO\Channel_userVO;
use Model\VO\ChannelVO;
use Model\VO\UserVO;

final class ChannelModel extends Model {

    public function selectAll(int $userId): array 
    {
        $db = new Database();
        $query = "SELECT channels.*
                    FROM channels
                    JOIN channel_user
                      ON channels.id = channel_user.channel_id
                   WHERE channel_user.user_id = :id";

        $data = $db->select($query, [':id' => $userId]);

        return Channel::fromCollection($data);
    }

    public function selectOne(int $channelId): ?Channel 
    {
        $db = new Database();
        $query = "SELECT channels.id, channels.channel_name, channels.channel_description, channels.channel_owner
                    FROM channels
                   WHERE channels.id = :id";

        $data = $db->select($query, [':id' => $channelId]);

        if (empty($data)) { return null;}

        return Channel::fromArray($data[0]);
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

    // Matutenção de usuários nos Channels

    public function selectUsersInChannel($vo) {
        $db = new Database();
        $query = "SELECT users.user_name
                    FROM channel_user
                    JOIN users
                      ON users.id = channel_user.user_id
                   WHERE channel_user.channel_id = :channel_id";
        
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