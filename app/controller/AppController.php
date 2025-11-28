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
        var_dump((new LoginAuthGateway("mm@gmail.com", '$2y$17$pKR083g.xdsjITp3d9neweBHGvUm.GeQbX6UB53BJ4eb0SLuPYFR.'))->_tryAuth());
    }


    /**
     * [@method] => GET
     * [@route] => /api/v1
     */
    public function api(){
        echo json_encode((new DatabaseWrapper("hardware_hub"))->_select("users", '*'));
    }
}