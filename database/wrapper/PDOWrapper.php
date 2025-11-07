<?php

namespace wrapper;

class PDOWrapper extends Wrapper {

    /** @var PDO $_pdo */
    private $_pdo;

    public function __construct(string $dbname){
        $this->_pdo = new \PDO("mysql:dbname={$dbname};host=localhost", "root", "root");
    }

}