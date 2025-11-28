<?php

namespace auth\security;

trait PasswordHashingTrait {

    /**
     * @param string $password
     *
     * @return string
     */
    public function _hashPassword(string $password) : string {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    /**
     * @param string $password
     *
     * @param string $hash
     *
     * @return bool
     */
    function _checkPassword(string $password, string $hash) : bool {
        return password_verify($password, $hash);
    }
}