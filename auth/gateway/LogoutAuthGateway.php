<?php

namespace auth\gateway;

use auth\AuthInstance;

final class LogoutAuthGateway extends AuthInstance {

    public function __construct(){
        parent::__construct("", "");
    }

    /**
     * @return bool
     */
    public function _tryAuth() : bool {
        return false;
    }
}