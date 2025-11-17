<?php

namespace modules\database\drivers;

enum DatabaseDriverEnum: string {

    case MYSQL = 'mysql';
    case SQLITE = 'sqlite';
    case PDO = 'pdo';

}
