<?php

namespace Model\Entity;

abstract class Entity {

    protected int $id;

    public function __construct(int $id) 
    {
        $this-> id = $id;
    }

    public function getId(): int { return $this->id; }
    public function setId(int $id): void {$this->id = $id; }
}