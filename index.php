<?php
namespace redcross\hurricane;

use redcross\hurricane\classes\app;

function autoLoad($class)
{
    $folders = array(
        '/sys/classes',
        '/sys/classes/parsers',
    );
    $nameSpaceParts = explode('\\', $class);

    foreach ($folders as $folder) {
        $fullPath = __DIR__ . $folder . '/' . end($nameSpaceParts) . '.php';
        if(file_exists($fullPath)) {
            require $fullPath;
        }
    }
}

spl_autoload_register(__NAMESPACE__ . '\autoLoad');

$app = new app();
$app->run();