<?php

namespace Model\Entity;

final class Channel extends Entity {
    
    private string $name;
    private string $description;
    private User $owner;
    
    public function __construct(int $id, string $name, string $description, User $owner) 
    {
        parent::__construct($id);
        $this->name = $name;
        $this->description = $description;
        $this->owner = $owner;
    }

    public function getName(): string { return $this->name; }
    public function setName(string $name): void { $this->name = $name; }

    public function getDescription(): string { return $this->description; }
    public function setDescription(string $description): void { $this->description = $description; }

    public function getOwner(): User { return $this->owner; }
    public function setOwner(User $owner): void { $this->owner = $owner; }
    
}
