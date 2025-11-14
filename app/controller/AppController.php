<?php

namespace app\controller;

use api\format\JsonResponse;

class AppController {

    /**
     * [@method] => GET
     * [@route] => /
     */
    public function index(){
        echo "Homepage demo for automated Router/Controller";
    }
}