<?php

namespace router;

use \ReflectionClass;
use \ReflectionException;

class ControllerGateway {

    /**
     * Router => Controller Gateway
     */
    public function _link(): void {
        $directory = __DIR__ . '/../app/controller/*.php';
        $controllerFiles = glob($directory);

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

                $method_type = strtolower($method_type);

                if (!method_exists(\router\Router::class, $method_type)) {
                    echo "[ControllerGateway] - ERROR - Router method $method_type does not exist";
                    continue;
                }

                \router\Router::$method_type($route, "{$class_name}@{$method->getName()}");
            }
        }
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
