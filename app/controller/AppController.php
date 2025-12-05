<?php

namespace app\controller;

use auth\gateway\LoginAuthGateway;
use modules\database\DatabaseWrapper;

class AppController {

    /**
     * [@method] => GET
     * [@route] => /
     */
    public function index(){
        echo "Homepage demo for automated Router/Controller";
    }
}