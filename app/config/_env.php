<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-19
 * Time: 8:05 AM
 */
require_once __DIR__.'/../../vendor/autoload.php';

// Root of our project
define('BASE_PATH', realpath(__DIR__ . '/../../'));

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);

$dotEnv->load();
