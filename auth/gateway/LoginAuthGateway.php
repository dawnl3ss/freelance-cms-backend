<?php

namespace auth\gateway;


use auth\AuthInstance;
use modules\database\DatabaseWrapper;

use auth\security\PasswordHashingTrait;


final class LoginAuthGateway extends AuthInstance implements AuthGatewayEventInterface {
    use PasswordHashingTrait;


    /** @var DatabaseWrapper $_wrapper */
    private DatabaseWrapper $_wrapper;

    public function __construct(string $_email, string $_password){
        parent::__construct($_email, $_password);
        $this->_wrapper = new DatabaseWrapper("hardware_hub");
    }


    /**
     * @return bool
     */
    public function _tryAuth() : bool {
        if ($this->_wrapper->_exist("users", [
            "email" => $this->_email,
            "password_hash" => $this->_hashPassword($this->_password)
        ])){
            return $this->_onSuccess();    # Trigger success-related events
        } else return $this->_onFailure(); # Trigger failure-related events
    }

    /**
     * @return string
     */
    public function _onSuccess() : string {
        $db_user_data = $this->_wrapper->_select("users", '*', [
            "email" => $this->_email,
            "password_hash" => $this->_hashPassword($this->_password)
        ])[0];


        return "";
    }

    /**
     * @return string
     */
    public function _onFailure() : string {
        return "";
    }
}