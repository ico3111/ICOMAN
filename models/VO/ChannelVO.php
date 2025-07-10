<?php

namespace Model\VO;

final class ChannelVO extends VO {
    
    private $name;
    private $description;
    private $owner;
    private $ownerName;
    
    public function __construct($id = 0, $name = '', $description = '', $owner = '', $ownerName = '') {
        parent::__construct($id);
        $this->name = $name;
        $this->description = $description;
        $this->owner = $owner;
        $this->ownerName = $ownerName;
    }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

    public function getOwner() { return $this->owner; }
    public function setOwner($owner) { $this->owner = $owner; }

    public function getOwnerName() { return $this->ownerName; }
    public function setOwnerName($ownerName) { $this->ownerName = $ownerName; }
    
}
