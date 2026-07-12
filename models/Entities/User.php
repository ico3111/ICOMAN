<?php

namespace Model\Entity;

final class User extends Entity {
    
    private string $username;
    private string $password;
    
    public function __construct(int $id, string $username, string $password)
    {
        parent::__construct($id);
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string { return $this->username; }
    public function setUsername(string $username): void { $this->username = $username; }

    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): void { $this->password = $password; }

}