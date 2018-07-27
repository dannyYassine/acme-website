<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-19
 * Time: 7:49 AM
 */

try {
    require_once __DIR__.'/../bootstrap/init.php';
} catch (Exception $e) {
    \App\Classes\ErrorHandler::handleException($e);
}
