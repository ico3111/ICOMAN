<?php

namespace Model\VO;

final class UserVO extends VO {
    
    private $username;
    private $password;
    
    public function __construct($id = 0, $username = '', $password = '') {
        parent::__construct($id);
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

}