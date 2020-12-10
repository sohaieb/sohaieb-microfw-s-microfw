<?php
require_once '../vendor/autoload.php';
require_once '../bootstrap/load-envs.php';
use Klein\Klein;

$klein = new Klein();

require_once '../routes/run-routes.php';

$klein->dispatch();
