<?php

namespace Model\VO;

final class PostVO extends VO {
    
    private $title;
    private $content;
    private $date;
    private $userId;
    private $userName;
    
    public function __construct($id = 0, $title = '', $content = '', $date = '', $userId = '', $userName = '') {
        parent::__construct($id);
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->userId = $userId;
        $this->userName = $userName;
    }

    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }

    public function getContent() { return $this->content; }
    public function setContent($content) { $this->content = $content; }

    public function getDate() { return $this->date; }
    public function setDate($date) { $this->date = $date; }

    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }

    public function getUserName() { return $this->userName; }
    public function setUserName($userName) { $this->userName = $userName; }
}
