<?php

namespace auth\gateway;

use auth\AuthInstance;

final class LogoutAuthGateway extends AuthInstance implements AuthGatewayEventInterface {

    public function __construct(){
        parent::__construct("", "");
    }

    /**
     * Auth job's purpose : check if user is already logged out.
     *
     * @return bool
     */
    public function _tryAuth() : bool {
        if (!isset($_SESSION["user"]))
            return $this->_setStatus($this->_onFailure(), false);

        return $this->_setStatus($this->_onSuccess([]), true);
    }

    /***
     * @param array $_data
     *
     * @return string
     */
    public function _onSuccess(array $_data) : string {
        unset($_SESSION["user"]);
        return "user successfullly logged out.";
    }

    /**
     * @return string
     */
    public function _onFailure() : string { return "failed"; }
}