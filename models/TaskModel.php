<?php

namespace Model;

use Model\Entity\Task;

final class TaskModel extends Model
{
    public function selectAll(int $boardId): array
    {
        $query = "SELECT tasks.*
                    FROM tasks
                   WHERE board_id = :id
                ORDER BY task_deadline ASC";

        $data = $this->db->select($query, [':id' => $boardId]);

        return Task::fromCollection($data);
    }

    public function selectOne(int $taskId): ?Task
    {
        $query = "SELECT tasks.*
                    FROM tasks
                   WHERE tasks.id = :id";

        $data = $this->db->select($query, [':id' => $taskId]);

        if (empty($data)) { return null; }

        return Task::fromArray($data[0]);
    }

    public function insert($task): void
    {
        $query = "INSERT
                    INTO tasks(task_title, task_description, task_deadline, user_id, board_id, is_checked)
                  VALUES (:task_title, :task_description, :task_deadline, :user_id, :board_id, :is_checked)";

        $binds = [
            ':task_title' => $task->getTitle(),
            ':task_description' => $task->getDescription(),
            ':task_deadline' => $task->getDeadline(),
            ':user_id' => $task->getUser()->getId(),
            ':board_id' => $task->getBoard()->getId(),
            ':is_checked' => $task->getIsChecked()
        ];

        $this->db->execute($query, $binds);
    }

    public function update($task): void
    {
        $query = "UPDATE tasks
                     SET task_title = :task_title,
                         task_description = :task_description,
                         task_deadline = :task_deadline,
                         is_checked = :is_checked
                   WHERE id = :id";

        $binds = [
            ':task_title' => $task->getTitle(),
            ':task_description' => $task->getDescription(),
            ':task_deadline' => $task->getDeadline(),
            ':is_checked' => $task->getIsChecked(),
            ':id' => $task->getId()
        ];

        $this->db->execute($query, $binds);
    }

    public function delete(int $taskId): void
    {
        $query = "DELETE
                    FROM tasks
                   WHERE id = :id";

        $this->db->execute($query, [':id' => $taskId]);
    }
}