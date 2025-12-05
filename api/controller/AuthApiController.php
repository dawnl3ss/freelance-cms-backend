<?php

namespace api\controller;

use api\format\JsonResponse;
use auth\gateway\LoginAuthGateway;

class AuthApiController
{

    /**
     * Login API route
     *
     * [@method] => GET
     * [@route] => /api/v1/auth/login/e={e}&p={e}
     */
    public function login($email, $password){
        $gateway = new LoginAuthGateway($email, $password);
        $json_response = new JsonResponse();

        if (!$gateway->_tryAuth()){
            $json_response->_add("status", "failed")->_add("message", $gateway->_getStatus());
            echo $json_response->_encode();
            return;
        }

        $json_response->_add("status", "success")->_add("message", $gateway->_getStatus());
        echo $json_response->_encode();
    }
}