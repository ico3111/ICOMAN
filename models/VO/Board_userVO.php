<?php

namespace Model\VO;

final class Board_userVO extends VO {
    private $boardId;
    private $userId;
    
    public function __construct($boardId = '', $userId = '') {
        $this->boardId = $boardId;
        $this->userId = $userId;
    }

    public function getBoardId() { return $this->boardId; }
    public function setBoardId($boardId) { $this->boardId = $boardId; }

    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }
    
}
