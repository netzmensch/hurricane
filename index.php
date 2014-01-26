<?php
namespace redcross\hurricane;

function __autoload($class)
{
    $parts = explode('\\', $class);

    $folders = array(
        'sys/classes',
        'sys/classes/parsers',
    );

    foreach ($folders as $folder) {
        $fullPath = __DIR__ . $folder . '/' . $class . end($parts) . '.php';
        if(file_exists($fullPath)) {
            require $fullPath;
        }
    }
}

use redcross\hurricane\classes\app;

$app = new app();

$app->run();