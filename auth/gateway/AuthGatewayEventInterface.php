<?php

namespace auth\gateway;

interface AuthGatewayEventInterface {

    /**
     * Bind even when auth failed - Return success message
     *
     * @return string
     */
    public function _onSuccess() : string;

    /**
     * Bind even when auth failed - Return failure message
     *
     * @return string
     */
    public function _onFailure() : string;
}