<?php

spl_autoload_register(function ($class) {
    $rep = str_replace('\\', '/', $class);

    if (is_file($rep . '.php')){
        require_once $rep . '.php';
    } else {
        echo "[Autoload] - ERROR - class $class does not exist.";
        die();
    }
});

?>