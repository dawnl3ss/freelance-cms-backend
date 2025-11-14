<?php

namespace database;

use database\drivers\DriverEnum;

abstract class Wrapper implements \database\DatabaseConnectable {

    /** @var DriverEnum $_driver */
    private $_driver;

    public function __construct(DriverEnum $_driver){
        $this->_driver = $_driver;
    }

    /**
     * @return string
     */
    public function _getDriver() : DriverEnum { return $this->_driver; }

    /**
     * @return void
     */
    abstract public function _connect() : void;
}