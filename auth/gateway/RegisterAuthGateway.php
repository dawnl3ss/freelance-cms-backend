<?php

namespace auth\gateway;

use auth\AuthInstance;

final class RegisterAuthGateway extends AuthInstance {

    /** @var string $_username */
    private string $_username;

    public function __construct(string $username, string $_email, string $_password){
        parent::__construct($_email, $_password);
        $this->_username = $_username;
    }


    /**
     * @return bool
     */
    public function _tryAuth() : bool {
        return false;
    }
}