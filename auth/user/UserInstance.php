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

namespace auth\user;


class UserInstance implements UserInterface {

    /** @var int $_uid */
    private int $_uid;

    /** @var string $_username */
    private string $_username;

    /** @var string $_email */
    private string $_email;

    /** @var array $_perms */
    private array $_perms;

    public function __construct(int $uid, string $username, string $email, string $_perms){
        $this->_uid = $uid;
        $this->_username = $username;
        $this->_email = $email;
        $this->_perms = explode(',', $_perms);
    }

    /**
     * Check if a user is logged in.
     *
     * @param array $_session
     *
     * @return bool
     */
    public static function _isLoggedIn() : bool {
        return isset($_SESSION["user"]) && unserialize($_SESSION["user"]) instanceof UserInstance;
    }

    /**
     * @return int
     */
    public function _getUid() : int { return $this->_uid; }


    /**
     * @return string
     */
    public function _getUsername() : string { return $this->_username; }

    /**
     * @return string
     */
    public function _getEmail() : string { return $this->_email; }

    /**
     * @return array
     */
    public function _getPerms() : array { return $this->_perms; }
}