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

use \ReflectionClass;
use \ReflectionException;


final class ControllerGateway {

    /**
     * Router => Controller Gateway | & API integration
     */
    public function _link() : void {
        $directory = __DIR__ . '/../app/controller/*.php';
        $controllerFiles = glob($directory);
        $router = new Router();

        foreach ($controllerFiles as $file){
            $class_name = 'app\controller\\' . pathinfo($file, PATHINFO_FILENAME);

            try {
                $reflection = new ReflectionClass($class_name);
            } catch (ReflectionException $e){
                echo "[ControllerGateway] - ERROR - Cannot reflect class $class_name: " . $e->getMessage();
                continue;
            }

            foreach ($reflection->getMethods() as $method){
                $doc = $method->getDocComment();
                if (!$doc) continue;

                $method_type = $this->extractAnnotation($doc, 'method');
                $route = $this->extractAnnotation($doc, 'route');

                if (!$method_type || !$route){
                    echo "[ControllerGateway] - ERROR - Wrong PHP Doc for {$class_name} Controller, method {$method->getName()}";
                    continue;
                }

                $router->_addRoute(strtoupper($method_type), $route, "{$class_name}@{$method->getName()}");
            }
        }

        $directory = __DIR__ . '/../api/controller/*.php';
        $controllerFiles = glob($directory);

        foreach ($controllerFiles as $file){
            $class_name = 'api\controller\\' . pathinfo($file, PATHINFO_FILENAME);

            try {
                $reflection = new ReflectionClass($class_name);
            } catch (ReflectionException $e){
                echo "[ControllerGateway] - ERROR - Cannot reflect class $class_name: " . $e->getMessage();
                continue;
            }

            foreach ($reflection->getMethods() as $method){
                $doc = $method->getDocComment();
                if (!$doc) continue;

                $method_type = $this->extractAnnotation($doc, 'method');
                $route = $this->extractAnnotation($doc, 'route');

                if (!$method_type || !$route){
                    echo "[ControllerGateway] - ERROR - Wrong PHP Doc for {$class_name} Controller, method {$method->getName()}";
                    continue;
                }

                $router->_addRoute(strtoupper($method_type), $route, "{$class_name}@{$method->getName()}");
            }
        }

        $router->_run();
    }

    /**
     *
     *
     * @param string $docComment
     *
     * @param string $annotation
     *
     * @return string|null
     */
    private function extractAnnotation(string $docComment, string $annotation) : ?string {
        if (preg_match("/\\[@{$annotation}\\]\\s*=>\\s*(\\S+)/", $docComment, $matches))
            return $matches[1];

        return null;
    }
}
