<?php

namespace Model\VO;

final class Channel_userVO extends VO {
    private $channelId;
    private $userId;
    
    public function __construct($channelId = '', $userId = '') {
        $this->channelId = $channelId;
        $this->userId = $userId;
    }

    public function getChannelId() { return $this->channelId; }
    public function setChannelId($channelId) { $this->channelId = $channelId; }

    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }
    
}
