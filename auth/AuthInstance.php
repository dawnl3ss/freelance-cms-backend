<?php

namespace auth;

use config\ProjectConfig;
use modules\database\DatabaseWrapper;

abstract class AuthInstance implements AuthInterface {

    /** @var string $_email */
    protected string $_email;

    /** @var string $_password */
    protected string $_password;

    /** @var bool $_status */
    protected bool $_status;

    /** @var DatabaseWrapper $_dbconn */
    protected DatabaseWrapper $_dbconn;

    public function __construct(string $email, string $password){
        $this->_email = $email;
        $this->_password = $password;
        $this->_status = false;
        $this->_dbconn = new DatabaseWrapper(ProjectConfig::AUTH_DATABASE_GATEWAY);
    }

    /**
     * @return string
     */
    protected function _getEmail() : string { return $this->_email; }

    /**
     * @return string
     */
    protected function _getPassword() : string { return $this->_email; }


    /**
     * @return bool
     */
    protected function _isValid() : bool { return $this->_status; }

    /**
     * @param bool $status
     *
     * @return bool
     */
    protected function _setStatus(bool $status) : bool {
        $this->_status = $status;
        return $status;
    }

    /**
     * @return bool
     */
    abstract public function _tryAuth() : bool;

}