<?php

namespace config;

final class ProjectConfig implements Configable {

    const string PROJECT_NAME = 'Project Name';

    const string DATABASE_ADDRESS = '127.0.0.1';
    const string DATABASE_USERNAME = 'root';
    const string DATABASE_PASSWORD = 'root';

    const string AUTH_DATABASE_GATEWAY = "";

    public function __construct(mixed $_data = null){
        if (!is_null($_data) && $_data instanceof Configable)
            $this->_unpack($_data);
    }

    /**
     * @param array $_data
     * @return Configable
     */
    public function _unpack(array $_data) : Configable {
        return $this;
    }

    /**
     * @param Configable $config
     * @return array
     */
    public function _pack(Configable $config) : array {
        return [];
    }
}