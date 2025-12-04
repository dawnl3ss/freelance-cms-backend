<?php

namespace auth\gateway;


use auth\AuthInstance;
use auth\user\UserInstance;
use config\ProjectConfig;


final class LoginAuthGateway extends AuthInstance implements AuthGatewayEventInterface {

    public function __construct(string $_email, string $_password){
        parent::__construct($_email, $_password);
    }

    /**
     * @return bool
     */
    public function _tryAuth() : bool {

        if ($this->_dbconn->_exist(ProjectConfig::AUTH_TABLE_GATEWAY, [
            "email" => $this->_email,
            "password_hash" => $this->_password
        ])){
            $this->_onSuccess();
            return $this->_setStatus(true);
        }

        $this->_onFailure();
        return $this->_setStatus(false);

    }

    /**
     * @return string
     */
    public function _onSuccess() : string {
        $user_db = $this->_dbconn->_select(ProjectConfig::AUTH_TABLE_GATEWAY, [
            "email" => $this->_email,
            "password_hash" => $this->_password
        ])[0];

        $_SESSION["user"] = new UserInstance(
            $user_db["uid"],
            $user_db["username"],
            $user_db["email"],
            $user_db["perms"]
        );
        return "user successfullly logged in.";
    }

    /**
     * @return string
     */
    public function _onFailure() : string {
        return "user login failed.";
    }
}