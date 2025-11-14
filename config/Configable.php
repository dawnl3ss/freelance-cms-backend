<?php

namespace config;

interface Configable {

    /**
     * Transform array to class - usefull if we need to import configuration later on
     *
     * @param array $_data
     * @return Configable
     */
    public function _unpack(array $_data) : Configable;

    /**
     * Transform class to array - usefull if we need to export configuration later on
     *
     * @param Configable $config
     * @return array
     */
    public function _pack(Configable $config) : array;
}