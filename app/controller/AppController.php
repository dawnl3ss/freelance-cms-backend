<?php

namespace app\controller;

use api\format\JsonResponse;

use modules\database\DatabaseWrapper;
use modules\database\drivers\DatabaseDriverEnum;

class AppController {

    /**
     * [@method] => GET
     * [@route] => /
     */
    public function index(){
        $wrapper = DatabaseWrapper::_getDriver()->_database("hardware_hub")->_query("SHOW DATABASES;");
        var_dump($wrapper);
        echo "Homepage demo for automated Router/Controller";
    }

    /**
     * [@method] => GET
     * [@route] => /caca
     */
    public function cacaccaccaca(){
        print_r((new JsonResponse())->_add("test", "vam bab"));
    }
}