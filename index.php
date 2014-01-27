<?php
namespace redcross\hurricane;

use redcross\hurricane\classes\app;

define('CONFIG_PATH_CLASSES', '/sys/classes');
define('CONFIG_PATH_PARSERS', '/sys/classes/parsers');
define('CONFIG_PATH_TEMPLATES', 'res/template');
define('CONFIG_PATH_CONTENT', 'page');
define('CONFIG_APP_STARTPAGE', 'home');
define('CONFIG_APP_WRONG_PATH_MESSAGE', 'wrong path...');

function autoLoad($class)
{
    $folders = array(
        CONFIG_PATH_CLASSES,
        CONFIG_PATH_PARSERS,
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