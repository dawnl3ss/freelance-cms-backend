<?php

namespace auth;

abstract class AuthGateway implements AuthInterface
{


    abstract public function _tryAuthenticate() : bool;


}