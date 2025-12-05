<?php

/*
 *
 *      █████╗ ███████╗████████╗██╗  ██╗███████╗██████╗         ██████╗ ██╗  ██╗██████╗
 *     ██╔══██╗██╔════╝╚══██╔══╝██║  ██║██╔════╝██╔══██╗        ██╔══██╗██║  ██║██╔══██╗
 *     ███████║█████╗     ██║   ███████║█████╗  ██████╔╝ █████╗ ██████╔╝███████║██████╔╝
 *     ██╔══██║██╔══╝     ██║   ██╔══██║██╔══╝  ██╔══██╗ ╚════╝ ██╔═══╝ ██╔══██║██╔═══╝
 *     ██║  ██║███████╗   ██║   ██║  ██║███████╗██║  ██║        ██║     ██║  ██║██║
 *     ╚═╝  ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝        ╚═╝     ╚═╝  ╚═╝╚═╝
 *
 *                      The divine lightweight PHP framework
 *                  < 1 Mo • Zero dependencies • Pure PHP 8.3+
 *
 *  Built from scratch. No bloat. POO Embedded.
 *
 *  @author: dawnl3ss (Alex') ©2025 — All rights reserved
 *  Source available • Commercial license required for redistribution
 *  → github.com/dawnl3ss/Aether-PHP
 *
*/
declare(strict_types=1);

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
        echo "Homepage demo for automated Router/Controller<br>";
        var_dump(UserInstance::_isLoggedIn());
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