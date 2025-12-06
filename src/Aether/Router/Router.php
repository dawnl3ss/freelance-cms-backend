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

namespace Aether\Router;

use Aether\Router\Http\HttpStandardsEnum;
use Aether\Router\Http\RouterHttpGateway;
use Aether\Router\Route\Route;
use Aether\Security\UserInputValidatorTrait;


final class Router implements  RouterInterface {
    use UserInputValidatorTrait;


    /** @var array[] $_routes */
    public $_routes = array(
        "GET" => [],
        "POST" => [],
        "DELETE" => [],
        "PUT" => [],
    );


    /**
     * @param string $method
     * @param string $route
     * @param $callable
     *
     * @return Router
     */
    public function _addRoute(string $method, string $route, $callable) : Router {
        array_push($this->_routes[$method], new Route($method, $route, $callable));
        return $this;
    }


    /**
     * @return bool
     * @throws \Exception
     */
    public function _run() : bool {
        $req_uri = RouterHttpGateway::_getHttpRequestUri();
        $req_method = strtoupper(RouterHttpGateway::_getHttpRequestMethod());

        if (!isset($this->_routes[$req_method]))
            return false;

        foreach ($this->_routes[$req_method] as $route){
            if ($route instanceof Route){

                # - Case 1 : URI == route - ex: uri:(/test) route:(/test)
                if (trim($req_uri, '/') == trim($route->_getRoute(), '/')){
                    header('HTTP/1.1 200 OK', true, 200);
                    $this->_execute($route->_getCallable());
                    return true;
                }


                # - Case 2 : URI contains params - only for HTTP GET
                if ($req_method !== HttpStandardsEnum::HTTP_GET)
                    continue;

                $path = preg_replace('#{([\w])+}#', '([^/]+)', trim($route->_getRoute(), '/'));
                $path_to_match = "#^$path$#";

                if (preg_match_all($path_to_match, trim($req_uri, '/'), $params)){
                    header('HTTP/1.1 200 OK', true, 200);
                    $this->_execute($route->_getCallable(), $params);
                    return true;
                }
            }
        }

        header("HTTP/1.1 404 Not Found", true, 404);
        return false;
    }


    /**
     * @param $callback
     * @param array|null $matche
     *
     * @return mixed
     * @throws \Exception
     */
    private function _execute($callback, ?array $params = []){
        $matches = [];

        foreach($params as $key => $value){
            if ($key != 0)
                array_push($matches, $this->_sanitizeInput($value[0]));
        }

        if (is_callable($callback))
            return call_user_func_array($callback, $matches);

        if (is_string($callback))
            $callback = explode('@', $callback);

        if (!class_exists($callback[0]))
            throw new \Exception("Class {$callback[0]} not found");

        $class = new $callback[0];

        if (!method_exists($class, $callback[1]))
            throw new \Exception("Method $callback[1] not found in class $callback[0]");

        return call_user_func_array([$class, $callback[1]], $matches);
    }

}