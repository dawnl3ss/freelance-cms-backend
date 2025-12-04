<?php

# - Dev
error_reporting(E_ALL);
ini_set('display_errors', 1);

# - Session
session_start();

# - Autoload
require_once __DIR__ . '/autoload.php';

# - Router Gateway : deliver correct controller for each route
(new \router\ControllerGateway())->_link();