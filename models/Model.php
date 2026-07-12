<?php

namespace Model;

use Model\Entity\Entity;

abstract class Model {

    abstract public function selectAll(int $id): array;
    abstract public function selectOne(int $id): Entity;
    abstract public function insert(Entity $entity): void;
    abstract public function update(Entity$entity): void;
    abstract public function delete(int $id): void;
    
}