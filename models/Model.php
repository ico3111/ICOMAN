<?php

namespace Model;

abstract class Model {
    
    protected Database $db;
    
    public function __construct() 
    {
        $this->db = new Database();
    }

    protected function lastId(string $tableName): int
    {
        $query = "SELECT id 
                    FROM ".$tableName."
                   ORDER BY id DESC LIMIT 1";
                   
        $data = $this->db->select($query);

        return $data[0][0];
    }

    abstract public function selectAll(int $id): array;
    abstract public function selectOne(int $id);
    abstract public function insert($entity): void;
    abstract public function update($entity): void;
    abstract public function delete(int $id): void;
    
}