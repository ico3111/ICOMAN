<?php

namespace Model;

use Model\Entity\Board;
use Model\Entity\User;

final class BoardModel extends Model
{
    public function selectAll(int $userId): array
    {     
        $query = "SELECT boards.*
                    FROM boards
                    JOIN board_user
                      ON boards.id = board_user.board_id
                   WHERE board_user.user_id = :id";

        $data = $this->db->select($query, [':id' => $userId]);

        return Board::fromCollection($data);
    }

    public function selectOne(int $boardId): Board
    {
        $query = "SELECT boards.*
                    FROM boards
                   WHERE boards.id = :id";

        $data = $this->db->select($query, [':id' => $boardId]);

        return Board::fromArray($data[0]);
    }

    public function insert($board): void
    {
        $query = "INSERT 
                    INTO boards(board_name, board_description, board_owner) 
                  VALUES (:board_name, :board_description, :board_owner)";
        
        $binds = [
            ':board_name' => $board->getName(), 
            ':board_description' => $board->getDescription(), 
            ':board_owner' => $board->getOwner()->getId()
        ];

        $this->db->execute($query, $binds);
    }
    
    public function update($board): void 
    {
        $query = "UPDATE boards 
                     SET board_name = :board_name, 
                         board_description = :board_description, 
                         board_owner = :board_owner
                   WHERE id = :id";

        $binds = [
            ':board_name' => $board->getName(), 
            ':board_description' => $board->getDescription(), 
            ':board_owner' => $board->getOwner()->getId(), 
            ':id' => $board->getId()
        ];
        
        $this->db->execute($query, $binds);
    }

    public function delete(int $boardId): void 
    {
        $query = "DELETE FROM boards WHERE id = :id";

        $this->db->execute($query, [':id' => $boardId]);
    }

    #+
    #+ Matutenção de usuários nos Boards
    #+

    public function selectUsersInBoard(int $boardId): array 
    {
        $query = "SELECT users.*
                    FROM board_user
                    JOIN users
                      ON users.id = board_user.user_id
                   WHERE board_user.board_id = :board_id";
        
        $data = $this->db->select($query, [':board_id' => $boardId]);

        return User::fromCollection($data);
    }

    public function isUserInBoard(int $userId, int $boardId): bool 
    {
        $query = "SELECT 1
                    FROM board_user 
                   WHERE board_id = :board_id 
                     AND user_id = :user_id";

        $binds = [
            ':user_id' => $userId,
            ':board_id' => $boardId 
        ];

        $data = $this->db->select($query, $binds);

        return !empty($data);
    }

    public function addUserToBoard(int $userId, int $boardId): void 
    {
        $query = "INSERT 
                    INTO board_user(board_id, user_id) 
                  VALUES (:board_id, :user_id)";

        $binds = [
            ':user_id' => $userId,
            ':board_id' => $boardId
        ];

        $this->db->execute($query, $binds);
    }

    public function deleteUserFromBoard(int $userId, int $boardId): void 
    {
        $query = "DELETE 
                    FROM board_user 
                   WHERE board_id = :board_id 
                     AND user_id = :user_id";

        $binds = [
            ':user_id' => $userId,
            ':board_id' => $boardId 
        ];

        $this->db->execute($query, $binds);
    }
}