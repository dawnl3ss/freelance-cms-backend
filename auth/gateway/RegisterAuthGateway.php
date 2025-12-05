<?php declare(strict_types=1);

namespace auth\gateway;

use auth\AuthInstance;
use auth\security\PasswordHashingTrait;
use config\ProjectConfig;

final class RegisterAuthGateway extends AuthInstance implements AuthGatewayEventInterface {
    use PasswordHashingTrait;

    /** @var string $_username */
    private string $_username;

    public function __construct(string $_username, string $_email, string $_password){
        parent::__construct($_email, $_password);
        $this->_username = $_username;
    }


    /**
     * Auth job's purpose : check if provided email is not already used.
     *
     * @return bool
     */
    public function _tryAuth() : bool {
        if ($this->_dbconn->_exist(ProjectConfig::AUTH_TABLE_GATEWAY, [ "email" => $this->_email ]))
            return $this->_setStatus($this->_onFailure(), false);

        return $this->_setStatus($this->_onSuccess([]), true);
    }


    /**
     * @param array $_data
     *
     * @return string
     */
    public function _onSuccess(array $_data) : string {
        $this->_dbconn->_insert(ProjectConfig::AUTH_TABLE_GATEWAY, [
            "username" => $this->_username,
            "email" => $this->_email,
            "password_hash" => $this->_hashPassword($this->_password),
            "perms" => ""
        ]);
        return "user successfullly signed up.";
    }

    /**
     * @return string
     */
    public function _onFailure() : string {
        return "user sign-up failed.";
    }
}