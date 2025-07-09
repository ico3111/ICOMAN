<?php

namespace Model\VO;

final class TaskVO extends VO {
    
    private $title;
    private $description;
    private $deadline;
    private $userId;
    private $boardId;
    private $isChecked;
    
    public function __construct($id = 0, $title = '', $description = '', $deadline = '', $userId = '', $boardId = '', $isChecked = null) {
        parent::__construct($id);
        $this->title = $title;
        $this->description = $description;
        $this->deadline = $deadline;
        $this->userId = $userId;
        $this->boardId = $boardId;
        $this->isChecked = $isChecked;
    }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

    public function getDeadline() { return $this->deadline; }
    public function setDeadline($deadline) { $this->deadline = $deadline; }

    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }

        
    public function getBoardId() { return $this->boardId; }
    public function setBoardId($boardId) { $this->boardId = $boardId; }

    public function getIsChecked() { return $this->isChecked; }
    public function setIsChecked($isChecked) { $this->isChecked = $isChecked; }

}