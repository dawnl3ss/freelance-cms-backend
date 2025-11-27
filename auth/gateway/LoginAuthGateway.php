<?php

namespace auth\gateway;

use auth\AuthInstance;
use modules\database\DatabaseWrapper;

final class LoginAuthGateway extends AuthInstance implements AuthGatewayEventInterface {

    public function __construct(string $_email, string $_password){
        parent::__construct($_email, $_password);
    }


    /**
     * @return bool
     */
    public function _tryAuth() : bool {
        return (new DatabaseWrapper("hardware_hub"))->_exist("users", ["email" => $this->_email, "password_hash" => $this->_password]);
    }

    /**
     * @return string
     */
    public function _onSuccess() : string {
        return "";
    }

    /**
     * @return string
     */
    public function _onFailure() : string {
        return "";
    }
}