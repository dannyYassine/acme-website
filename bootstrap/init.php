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

try {
    // Load environment variables
    require __DIR__.'/../app/config/_env.php';

    #$appName = getenv('APP_NAME');

    // Database
    $db = new \App\Classes\Database();

    // All routes
    require_once __DIR__ . '/../app/routing/routes.php';
} catch (Exception $e) {
    echo $e;
}
