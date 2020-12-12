<?php
require_once '../vendor/autoload.php';
require_once '../bootstrap/load-envs.php';
use Klein\Klein;
enableJsonMiddleware();
if(env('SERVER_ALIAS')!=='/'){
    require '../bootstrap/uri-handler.php';
}
$klein = new Klein();

require_once '../routes/run-routes.php';

$klein->dispatch();
