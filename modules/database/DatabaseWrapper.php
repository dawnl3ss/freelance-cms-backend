<?php

namespace modules\database;


use modules\database\drivers\DatabaseConnectable;
use modules\database\drivers\DatabaseDriver;
use modules\database\drivers\DatabaseDriverEnum;
use modules\database\drivers\list\DatabasePdoDriver;


class DatabaseWrapper implements DatabaseConnectable {


    /**
     * @return DatabaseDriver
     */
    public static function _getDriver() : DatabaseDriver {
        /*return match ($driverEnum){
            DatabaseDriverEnum::PDO => new DatabasePdoDriver(),
            default => new DatabasePdoDriver(),
        };*/
        return new DatabasePdoDriver();
    }
}