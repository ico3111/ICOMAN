<?php

namespace Model;
require_once 'config.php';
use \PDO;

Class Database {

    protected $db;

    public function __construct() {
        $this -> db = new PDO("mysql:host=" . HOST . ";dbname=". BASE, USER, PASS);
        $this -> db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function select($query, $binds = []) {
        $stmt = $this -> db -> prepare($query);

        foreach ($binds as $i => $bind) {
            $stmt -> bindValue($i, $bind);
        }

        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    public function execute($query, $binds = []) {
        $stmt = $this -> db -> prepare($query);

        foreach ($binds as $i => $bind) {
            $stmt -> bindValue($i, $bind);
        }

        return $stmt -> execute();
    }

    public function getLastId() {
        return $this -> db -> lastInsertId();
    }

    public function __destruct() {
        $this -> db = null;
    }
}