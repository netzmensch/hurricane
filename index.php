<?php

namespace redcross\hurricane;

require_once('sys/classes/helper.php');
require_once('sys/classes/base.php');
require_once('sys/classes/page.php');
require_once('sys/classes/app.php');

use redcross\hurricane\classes\app;

$app = new app();

$app->run();