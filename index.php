<?php

# - Dev
error_reporting(E_ALL);
ini_set('display_errors', 1);

# - Cookies Security Fix
session_set_cookie_params([
    'httponly' => true,
    'secure' => true,
    'samesite' => 'Strict'
]);


# - Session
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 365);
session_start();



# - Autoload
require_once __DIR__ . '/autoload.php';

# - Router Gateway : deliver correct controller for each route
(new \router\ControllerGateway())->_link();