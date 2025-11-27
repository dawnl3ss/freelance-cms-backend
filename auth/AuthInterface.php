<?php

namespace auth;

interface AuthInterface {

    /**
     * Triggered function when user is either loging in or signing up or signing out
     *
     * @return bool
     */
    public function _tryAuth() : bool;

}