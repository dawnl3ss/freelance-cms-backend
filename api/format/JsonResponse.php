<?php

namespace api\format;

class JsonResponse {

    /** @var array $_json */
    private array $_json;

    public function __construct(?array $json = []){
        $this->_json = $json;
    }

    /**
     * @param $key
     *
     * @param $value
     *
     * @return JsonResponse
     */
    public function _add($key, $value) : self {
        $this->_json[$key] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function _encode() : string { return json_encode($this->_json); }

}