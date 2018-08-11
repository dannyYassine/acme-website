<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-08-11
 * Time: 1:49 PM
 */

use App\Routing\RouteBuilder;

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

// subcategories

$router->map(
    'POST',
    '/admin/product/subcategory/create',
    'App\Controllers\Admin\SubCategoryController@POST',
    'sub_category_post');

$router->map(
    'POST',
    '/admin/product/subcategory/[i:id]/edit',
    'App\Controllers\Admin\SubCategoryController@edit',
    'edit_sub_category_post');

$router->map(
    'POST',
    '/admin/product/subcategory/[i:id]/delete',
    'App\Controllers\Admin\SubCategoryController@DELETE',
    'edit_sub_category_delete');




