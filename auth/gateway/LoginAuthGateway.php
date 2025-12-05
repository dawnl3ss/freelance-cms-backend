<?php

namespace auth\gateway;


use auth\AuthInstance;
use auth\security\PasswordHashingTrait;
use auth\user\UserInstance;
use config\ProjectConfig;


final class LoginAuthGateway extends AuthInstance implements AuthGatewayEventInterface {
    use PasswordHashingTrait;

    public function __construct(string $_email, string $_password){
        parent::__construct($_email, $_password);
    }

    /**
     * @return bool
     */
    public function _tryAuth() : bool {
        if (!$this->_dbconn->_exist(ProjectConfig::AUTH_TABLE_GATEWAY, [ "email" => $this->_email ])) {
            $this->_onFailure();
            return $this->_setStatus(false);
        }

        $_data = $this->_dbconn->_select(ProjectConfig::AUTH_TABLE_GATEWAY, '*', [ "email" => $this->_email ])[0];

        if (!$this->_checkPassword($this->_password, $_data["password_hash"])){
            $this->_onFailure();
            return $this->_setStatus(false);
        }

        $this->_onSuccess($_data);
        return $this->_setStatus(true);
    }

    /***
     * @param array $_data
     *
     * @return string
     */
    public function _onSuccess(array $_data) : string {
        $user_db = $_data;

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