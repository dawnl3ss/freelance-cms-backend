<?php

namespace auth\gateway;

interface AuthGatewayEventInterface {

    /**
     * Bind event when auth succeed - Return success message
     *
     * @return string
     */
    public function _onSuccess() : string;

    /**
     * Bind event when auth failed - Return failure message
     *
     * @return string
     */
    public function _onFailure() : string;
}