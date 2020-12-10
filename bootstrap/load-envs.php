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
