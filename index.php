<?php

use App\Controllers\HomeController;
use App\Middleware\Authenticate;
use Core\Router;

require_once  __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/core/api.php';

require_once __DIR__ . '/app/Views/includes/header.php';

require_once __DIR__ . '/core/web.php';



require_once __DIR__ . '/app/Views/includes/footer.php';
