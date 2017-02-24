<?php
require __DIR__ . '/vendor/autoload.php';

function autoloadModel($class_name) {
    $filename = __DIR__ . '/src/' . $class_name . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadTables($class_name) {
    $filename = __DIR__ . '/src/tables/' . $class_name . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadTables");
