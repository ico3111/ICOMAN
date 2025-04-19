<?php

namespace Model\VO;

final class TaskVO extends VO {
    
    private $title;
    private $description;
    private $deadline;
    private $userId;
    
    public function __construct($id = 0, $title = '', $description = '', $deadline = '', $userId = '') {
        parent::__construct($id);
        $this->title = $title;
        $this->description = $description;
        $this->deadline = $deadline;
        $this->userId = $userId;
    }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

    public function getDeadline() { return $this->deadline; }
    public function setDeadline($deadline) { $this->deadline = $deadline; }

    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }

}