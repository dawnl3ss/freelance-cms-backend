<?php

namespace app\controller;


use auth\gateway\LoginAuthGateway;
use auth\gateway\LogoutAuthGateway;
use auth\user\UserInstance;

class AppController {

    /**
     * [@method] => GET
     * [@route] => /
     */
    public function index(){
        echo "Homepage demo for automated Router/Controller";
    }

    /**
     * [@method] => GET
     * [@route] => /test
     */
    public function test(){
        echo "<pre>";
        //var_dump((new LogoutAuthGateway())->_tryAuth());
        //var_dump((new LoginAuthGateway("admin@gmail.com", "aetherphp"))->_tryAuth());
        //var_dump(UserInstance::_isLoggedIn());
        //var_dump(unserialize($_SESSION["user"])->_getEmail());
        echo "</pre>";
    }
}