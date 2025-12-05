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

namespace router;

use router\route\Route;


interface RouterInterface {

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function get(string $route, $callback);

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function post(string $route, $callback);

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function put(string $route, $callback);

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function patch(string $route, $callback);

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function delete(string $route, $callback);

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function options(string $route, $callback);

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function head(string $route, $callback);
}
