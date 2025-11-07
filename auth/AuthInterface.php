<?php

namespace auth;

interface AuthInterface {

    public function _tryAuthenticate() : bool;

}