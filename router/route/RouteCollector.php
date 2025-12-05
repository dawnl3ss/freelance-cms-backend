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

namespace router\route;

use router\RouterInterface;


class RouteCollector implements RouterInterface {

    /** @var string $base */
    private static string $base;

    /**
     * @param string $base
     *
     * @return RouteCollector
     */
    public static function new(string $base){
        self::$base = trim($base, '/') . '/';
        return new self();
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function get(string $route, $callback) : Route {
        return Router::get(self::$base . trim($route, '/'), $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function post(string $route, $callback) : Route {
        return Router::post(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function put(string $route, $callback) : Route {
        return Router::put(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function patch(string $route, $callback) : Route {
        return Router::patch(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function delete(string $route, $callback) : Route {
        return Router::delete(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function options(string $route, $callback) : Route {
        return Router::options(self::$base . $route, $callback);
    }

    /**
     * @param string $route
     *
     * @param string|array|callback $callback
     *
     * @return Route
     */
    public static function head(string $route, $callback) : Route {
        return Router::head(self::$base . $route, $callback);
    }
}
