<?php


namespace utils;


final class IdsMap {

    /** @var string $_login */
    private string $_login;

    /** @var string $_keypass */
    private string $_keypass;

    public function __construct(string $login, string $keypass){
        $this->_login = $login;
        $this->_keypass = $keypass;
    }


    /**
     * @return string
     */
    public function _getLogin() : string { return $this->_login; }

    /**
     * @return string
     */
    public function _getPasskey() : string { return $this->_keypass; }

}