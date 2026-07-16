<?php

namespace Model;

use Model\Entity\Entity;
use Model\Entity\User;

abstract class Model {

    abstract public function selectAll(int $id): array;
    abstract public function selectOne(int $id);
    abstract public function insert($entity): void;
    abstract public function update($entity): void;
    abstract public function delete(int $id): void;
    
}