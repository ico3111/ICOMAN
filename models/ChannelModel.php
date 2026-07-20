<?php

namespace Model;

use Model\Entity\Channel;
use Model\Entity\User;

final class ChannelModel extends Model 
{
    public function selectAll(int $userId): array 
    {
        $query = "SELECT channels.*
                    FROM channels
                    JOIN channel_user
                      ON channels.id = channel_user.channel_id
                   WHERE channel_user.user_id = :id";

        $data = $this->db->select($query, [':id' => $userId]);

        return Channel::fromCollection($data);
    }

    public function selectOne(int $channelId): ?Channel 
    {
        $query = "SELECT channels.*
                    FROM channels
                   WHERE channels.id = :id";

        $data = $this->db->select($query, [':id' => $channelId]);

        if (empty($data)) { return null; }

        return Channel::fromArray($data[0]);
    }

    public function insert($channel): void
    {
        $query = "INSERT 
                    INTO channels(channel_name, channel_description, channel_owner) 
                  VALUES (:channel_name, :channel_description, :channel_owner)";
        
        $binds = [
            ':channel_name' => $channel->getName(), 
            ':channel_description' => $channel->getDescription(), 
            ':channel_owner' => $channel->getOwner()->getId()
        ];

        $this->db->execute($query, $binds);
    }
    
    public function update($channel): void
    {
        $query = "UPDATE channels 
                     SET channel_name = :channel_name, 
                         channel_description = :channel_description, 
                         channel_owner = :channel_owner
                   WHERE id = :id";

        $binds = [
            ':channel_name' => $channel->getName(), 
            ':channel_description' => $channel->getDescription(), 
            ':channel_owner' => $channel->getOwner()->getId(), 
            ':id' => $channel->getId()
        ];
        
        $this->db->execute($query, $binds);
    }

    public function delete(int $channelId): void
    {
        $query = "DELETE FROM channels WHERE id = :id";

        $this->db->execute($query, [':id' => $channelId]);
    }

    #+
    #+ Matutenção de usuários nos Channels
    #+

    public function selectUsersInChannel(int $channelId): array 
    {
        $query = "SELECT users.*
                    FROM channel_user
                    JOIN users
                      ON users.id = channel_user.user_id
                   WHERE channel_user.channel_id = :channel_id";
        
        $data = $this->db->select($query, [':channel_id' => $channelId]);

        return User::fromCollection($data);
    }

    public function isUserInChannel(int $userId, int $channelId): bool 
    {
        $query = "SELECT 1 
                    FROM channel_user 
                   WHERE channel_id = :channel_id 
                     AND user_id = :user_id";

        $binds = [
            ':user_id' => $userId,
            ':channel_id' => $channelId 
        ];

        $data = $this->db->select($query, $binds);

        return !empty($data);
    }

    public function addUserToChannel(int $userId, int $channelId): void
    {
        $query = "INSERT 
                    INTO channel_user(channel_id, user_id) 
                  VALUES (:channel_id, :user_id)";

        $binds = [
            ':user_id' => $userId,
            ':channel_id' => $channelId
        ];

        $this->db->execute($query, $binds);
    }

    public function deleteUserFromChannel(int $userId, int $channelId): void
    {
        $query = "DELETE 
                    FROM channel_user 
                   WHERE channel_id = :channel_id 
                     AND user_id = :user_id";

        $binds = [
            ':user_id' => $userId,
            ':channel_id' => $channelId
        ];

        $this->db->execute($query, $binds);
    }
}