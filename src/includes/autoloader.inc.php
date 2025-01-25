<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $path = "../classes/";
    $ext = ".class.php";
    $fullPath = $path . $className . $ext;

    if (!file_exists($fullPath)) {
        error_log("Class $className could not be loaded. File does not exist: $fullPath");
        return false;
    }

    include_once $fullPath;
}

