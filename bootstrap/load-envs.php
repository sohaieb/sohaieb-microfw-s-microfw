<?php

use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$str = dirname(dirname(__FILE__)) . '/.env';
$dotenv->load(__DIR__.'/.env');

/**
 * Get .env entities
 *
 * @param $name
 * @return mixed
 */
function env($name) {
  return $_ENV[$name];
}

/**
 * Mini json middleware response
 */
function enableJsonMiddleware(){
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Accept');
}
