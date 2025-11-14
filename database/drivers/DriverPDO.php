<?php

namespace database\drivers;

use database\Wrapper;

final class DriverPDO extends Wrapper {

    /** @var PDO $_pdo */
    private $_pdo;

    public function __construct(string $dbname){
        parent::__construct(DriverEnum::PDO);
        $this->_pdo = new \PDO("mysql:dbname={$dbname};host=localhost", "root", "root");
    }

    public function _connect() : void {
    }
}