<?php

namespace Model;

use Model\Entity\User;

final class UserModel extends Model {

    public function selectAll(int $userId): array
    {
        $db = new Database();
        $query = "SELECT *
                    FROM users
                   WHERE id = :id";

        $data = $db->select($query, [':id' => $userId]);

        return User::fromCollection($data);
    }

    public function selectOne(int $userId): User 
    {
        $db = new Database();
        $query = "SELECT *
                    FROM users
                   WHERE user_name = :user_name";

        $data = $db->select($query, [':user_name' => $userId]);

        return User::fromArray($data[0]);
    }

    public function selectLogin(string $userName): ?User
    {
        $db = new Database();
        $query = "SELECT *
                    FROM users
                   WHERE user_name = :user_name";

        $data = $db->select($query, [':user_name' => $userName]);

        if (empty($data)) { return null; }

        return User::fromArray($data[0]);
    }
    
    public function insert($user): void
    {
        $db = new Database();
        $query = "INSERT 
                    INTO users(user_name, user_password) 
                  VALUES (:user_name, :user_password)";
        
        $binds = [
            ':user_name' => $user->getUsername(), 
            ':user_password' => $user->getPassword()
        ];

        $db->execute($query, $binds);
    }
    
    public function update($user): void
    {
        // ...
    }
    
    public function delete(int $userId): void
    {
        // ...
    }
    
}