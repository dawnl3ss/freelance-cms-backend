<?php

namespace modules\database;


use modules\database\drivers\DatabaseConnectable;
use modules\database\drivers\DatabaseDriver;
use modules\database\drivers\DatabaseDriverEnum;
use modules\database\drivers\list\DatabasePdoDriver;


class DatabaseWrapper {

    /** @var string $_database */
    private string $_database;

    /** @var DatabaseDriver $_driver */
    private DatabaseDriver $_driver;
    
    public function __construct(string $database){
        $this->_driver = $this->_getDriver();
        $this->_database = $database;
    }


    /**
     * Operate a SQL 'SELECT' query
     *
     * @param string $table
     * @param string $content
     * @param array $assoc
     *
     * @return mixed
     */
    public function _select(string $table, string $content, array $assoc = []){
        $query = "SELECT {$content} FROM {$table}";

        if (count(array_keys($assoc)) > 1){
            $query .= " WHERE ";
            $i = 1;

            foreach (array_keys($assoc) as $key){
                $query .= "{$key} = :{$key}";
                if ($i > 1) $query .= " AND ";
                $i++;
            }
        }

        return $this->_driver->_database($this->_database)->_query($query, $assoc);
    }


    /**
     * Operate a 'INSERT INTO' SQL query
     *
     * @param string $table
     * @param array $assoc
     *
     * @return mixed
     */
    public function _insert(string $table, array $assoc){
        $query = "INSERT INTO {$table} (" . implode(',', array_keys($assoc)) . ") VALUES (:" . implode(',:', array_keys($assoc)) . ")";
        return $this->_driver->_database($this->_database)->_query($query, $assoc);
    }


    /**
     * Check if a value is in a table
     *
     * @param $table
     * @param string $content
     * @param array $assoc
     *
     * @return bool
     */
    public function _exist($table, string $content, array $assoc = []){
        return $this->_select($table, $content, $assoc) != [];
    }


    /**
     * @return DatabaseDriver
     */
    private function _getDriver() : DatabaseDriver {
        /*return match ($driverEnum){
            DatabaseDriverEnum::PDO => new DatabasePdoDriver(),
            default => new DatabasePdoDriver(),
        };*/
        return new DatabasePdoDriver();
    }

}