<?php

namespace app\controller;

use auth\gateway\LoginAuthGateway;

class AppController {

    /**
     * [@method] => GET
     * [@route] => /
     */
    public function index(){
        echo "Homepage demo for automated Router/Controller";
        echo "<br><br>";
        var_dump((new LoginAuthGateway("admin@gmail.com", "aetherphp"))->_tryAuth());
        echo "<br><br>";
    }
}