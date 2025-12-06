<?php

/*
 *
 *      █████╗ ███████╗████████╗██╗  ██╗███████╗██████╗         ██████╗ ██╗  ██╗██████╗
 *     ██╔══██╗██╔════╝╚══██╔══╝██║  ██║██╔════╝██╔══██╗        ██╔══██╗██║  ██║██╔══██╗
 *     ███████║█████╗     ██║   ███████║█████╗  ██████╔╝ █████╗ ██████╔╝███████║██████╔╝
 *     ██╔══██║██╔══╝     ██║   ██╔══██║██╔══╝  ██╔══██╗ ╚════╝ ██╔═══╝ ██╔══██║██╔═══╝
 *     ██║  ██║███████╗   ██║   ██║  ██║███████╗██║  ██║        ██║     ██║  ██║██║
 *     ╚═╝  ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝        ╚═╝     ╚═╝  ╚═╝╚═╝
 *
 *                      The divine lightweight PHP framework
 *                  < 1 Mo • Zero dependencies • Pure PHP 8.3+
 *
 *  Built from scratch. No bloat. POO Embedded.
 *
 *  @author: dawnl3ss (Alex') ©2025 — All rights reserved
 *  Source available • Commercial license required for redistribution
 *  → github.com/dawnl3ss/Aether-PHP
 *
*/
declare(strict_types=1);

namespace Aether\Config;


final class ProjectConfig implements Configable {

    const string PROJECT_NAME = 'Project Name';

    const string DATABASE_ADDRESS = '127.0.0.1';
    const string DATABASE_USERNAME = 'root';
    const string DATABASE_PASSWORD = 'root';

    const string AUTH_DATABASE_GATEWAY = "aetherphp";
    const string AUTH_TABLE_GATEWAY = "users";

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