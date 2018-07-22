<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 11:24 AM
 */

$router = new AltoRouter;

try {
    $router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
} catch (Exception $e) {
    echo $e;
}

$routerDispatcher = new App\Routing\RouteDispatcher($router);


