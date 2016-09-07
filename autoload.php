<?php
    spl_autoload_register(function ($class) {
        $prefix = 'App\\';
        $length = strlen($prefix);
        if (strpos($class, $prefix) !== 0) {
            return;
        }
        $_class = substr($class, $length);
        $pathFile = __DIR__ . '/' . str_replace('\\', '/', $_class) . '.php';

        if (file_exists($pathFile)) {
            require_once $pathFile;
        }
    });