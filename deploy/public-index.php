<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// APP_DIR (~/app_falarcompsico) fica FORA do document root (~/public_html).
// Este arquivo e copiado para ~/public_html/index.php no deploy,
// entao os caminhos abaixo apontam um nivel acima, para o diretorio irmao.
$appDir = __DIR__.'/../app_falarcompsico';

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $appDir.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $appDir.'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once $appDir.'/bootstrap/app.php';

$app->handleRequest(Request::capture());
