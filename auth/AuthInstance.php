<?php

namespace auth;

abstract class AuthInstance implements AuthInterface {

    /** @var string $_email */
    protected string $_email;

    /** @var string $_password */
    protected string $_password;

    public function __construct(string $email, string $password){
        $this->_email = $email;
        $this->_password = $password;
    }


    /**
     * @return string
     */
    protected function _getEmail() : string { return $this->_email; }

    /**
     * @return string
     */
    protected function _getPassword() : string { return $this->_email; }


    abstract public function _tryAuth() : bool;

}