<?php

namespace modules\database\drivers;


interface DatabaseConnectable {


    /**
     * Initiate the connection with the database
     *
     * @return DatabaseDriver
     */
    public function _connect() : DatabaseDriver;


    /**
     * Send a query to the database
     *
     * @param string $query
     * @param array $params
     *
     * @return mixed
     */
    public function _query(string $query, array $params) : mixed;


    /**
     * Return a string which contain database dump
     *
     * @return array
     */
    public function _dump() : array;
}