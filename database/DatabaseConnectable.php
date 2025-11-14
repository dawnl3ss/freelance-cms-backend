<?php

namespace database;

use database\drivers\DriverEnum;

interface DatabaseConnectable {

    /**
     * Get the current driver used (mysql/mongodb/sqlite)
     *
     * @return DriverEnum
     */
    public function _getDriver() : DriverEnum;

    /**
     * Connect to Database driver
     *
     * @return void
     */
    public function _connect(): void;

}