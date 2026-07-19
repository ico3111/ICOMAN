<?php

namespace Model\Entity;

final class User extends Entity {
    
    private string $username;
    private string $password;
    
    public function __construct(?int $id, string $username, string $password = '')
    {
        parent::__construct($id);
        $this->username = $username;
        $this->password = $password;
    }

    public static function fromArray(array $data) : User
    {
        return new User(
            $data['id'], 
            $data['user_name'], 
            $data['user_password']
        );
    }

    public static function fromCollection(array $data): array
    {
        $arrayData = [];
        foreach($data as $row) {
            $arrayData[] = self::fromArray($row);
        }

        return $arrayData;
    }

    public function getUsername(): string { return $this->username; }
    public function setUsername(string $username): void { $this->username = $username; }

    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): void { $this->password = $password; }

}