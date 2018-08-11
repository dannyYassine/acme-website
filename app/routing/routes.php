<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 11:24 AM
 */

$router = new AltoRouter;

try {

    require_once __DIR__ . '/admin_routes.php';
    require_once __DIR__ . '/api_routes.php';

} catch (Exception $e) {
    \App\Classes\ErrorHandler::handleException($e);
}

$routerDispatcher = new App\Routing\RouteDispatcher($router);


