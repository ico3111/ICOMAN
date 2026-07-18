<?php

namespace Model;

use Model\Entity\User;

final class UserModel extends Model
{
    public function selectAll(int $userId): array
    {
        $query = "SELECT users.*
                    FROM users
                   WHERE id = :id";

        $data = $this->db->select($query, [':id' => $userId]);

        return User::fromCollection($data);
    }

    public function selectOne(int $userId): ?User
    {
        $query = "SELECT users.*
                    FROM users
                   WHERE users.id = :id";

        $data = $this->db->select($query, [':id' => $userId]);

        if (empty($data)) { return null; }

        return User::fromArray($data[0]);
    }

    public function selectLogin(string $userName): ?User
    {
        $query = "SELECT users.*
                    FROM users
                   WHERE users.user_name = :user_name";

        $data = $this->db->select($query, [':user_name' => $userName]);

        if (empty($data)) { return null; }

        return User::fromArray($data[0]);
    }

    public function insert($user): void
    {
        $query = "INSERT
                    INTO users(user_name, user_password)
                  VALUES (:user_name, :user_password)";

        $binds = [
            ':user_name' => $user->getUsername(),
            ':user_password' => $user->getPassword()
        ];

        $this->db->execute($query, $binds);
    }

    public function update($user): void
    {
        $query = "UPDATE users
                     SET user_name = :user_name,
                         user_password = :user_password
                   WHERE id = :id";

        $binds = [
            ':user_name' => $user->getUsername(),
            ':user_password' => $user->getPassword(),
            ':id' => $user->getId()
        ];

        $this->db->execute($query, $binds);
    }

    public function delete(int $userId): void
    {
        $query = "DELETE
                    FROM users
                   WHERE id = :id";

        $this->db->execute($query, [':id' => $userId]);
    }
}