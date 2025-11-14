<?php

namespace database\drivers;

enum DriverEnum: string {

    case MYSQL = 'mysql';
    case SQLITE = 'sqlite';
    case PDO = 'pdo';

}
