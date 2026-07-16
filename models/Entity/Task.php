<?php

namespace Model\Entity;

final class Task extends Entity {
    
    private string $title;
    private string $description;
    private string $deadline;
    private bool $isChecked;
    private User $user;
    private Board $board;
    
    public function __construct(int $id, string $title, string $description, string $deadline, bool $isChecked, User $user, Board $board) 
    {
        parent::__construct($id);
        $this->title = $title;
        $this->description = $description;
        $this->deadline = $deadline;
        $this->isChecked = $isChecked;
        $this->user = $user;
        $this->board = $board;
    }

    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): void { $this->title = $title; }

    public function getDescription(): string { return $this->description; }
    public function setDescription(string $description): void { $this->description = $description; }

    public function getDeadline(): string { return $this->deadline; }
    public function setDeadline(string $deadline): void { $this->deadline = $deadline; }
    
    public function getIsChecked(): bool { return $this->isChecked; }
    public function setIsChecked(bool $isChecked): void { $this->isChecked = $isChecked; }

    public function getUser(): User { return $this->user; }
    public function setUser(User $user): void { $this->user = $user; }
        
    public function getBoard(): Board { return $this->board; }
    public function setBoard(Board $board): void { $this->board = $board; }
    
}