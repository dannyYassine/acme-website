<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 11:24 AM
 */

use App\Routing\RouteBuilder;
$router = new AltoRouter;

try {
    // admin routes
    $router->map(
        'GET',
        RouteBuilder::instance()->setBase('admin')->build(),
        'App\Controllers\Admin\DashboardController@handle',
        'admin_get');
    $router->map(
        'POST',
        '/admin',
        'App\Controllers\Admin\DashboardController@get',
        'admin_post');

    // product management
    $router->map(
        'GET',
        '/admin/product/categories',
        'App\Controllers\Admin\ProductCategoryController@show',
        'product_category_get');
    $router->map(
        'POST',
        '/admin/product/categories',
        'App\Controllers\Admin\ProductCategoryController@POST',
        'product_category_post');

    RouteBuilder::instance()
        ->setBase('admin')
        ->addPath('product')
        ->addPath('categories')
        ->addPath('[i:id]')
        ->addPath('edit');

    $router->map(
        'POST',
        '/admin/product/categories/[i:id]/edit',
        'App\Controllers\Admin\ProductCategoryController@edit',
        'edit_product_category_post');

    $router->map(
        'POST',
        '/admin/product/categories/[i:id]/delete',
        'App\Controllers\Admin\ProductCategoryController@DELETE',
        'edit_product_category_delete');

    $router->map(
        'GET',
        '/api/php_info',
        function () {
            phpinfo();
        },
        'api_php_info');
} catch (Exception $e) {
    \App\Classes\ErrorHandler::handleException($e);
}

$routerDispatcher = new App\Routing\RouteDispatcher($router);


