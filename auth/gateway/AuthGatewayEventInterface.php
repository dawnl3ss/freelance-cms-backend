<?php

namespace auth\gateway;

interface AuthGatewayEventInterface {

    /**
     * Bind event when auth succeed - Return success message
     *
     * @param array $_data
     *
     * @return string
     */
    public function _onSuccess(array $_data) : string;

    /**
     * Bind event when auth failed - Return failure message
     *
     * @return string
     */
    public function _onFailure() : string;
}