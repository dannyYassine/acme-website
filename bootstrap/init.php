<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-19
 * Time: 8:12 AM
 */


/**
 * Start session if not already started
 */
if(!isset($_SESSION)) {
    session_start();
}

// Load environment variables
require __DIR__.'/../app/config/_env.php';

// set custom error handler
set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);

// Database
$db = new \App\Classes\Database();

// All routes
require_once __DIR__ . '/../app/routing/routes.php';
