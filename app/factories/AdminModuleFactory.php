<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-26
 * Time: 10:10 PM
 */

namespace App\Classes;

use App\Controllers\DashboardController;
use App\Controllers\IRoutableController;
use App\Services\AdminService;

interface HandleRoutable
{
    public function handle();
}

class AdminModuleFactory
{
    public static function rootPage() : HandleRoutable
    {
        $service = new AdminService();

        return $service;
    }
}

class AdminControllerFactory
{
    public static function root(): IRoutableController
    {
        $controller = new DashboardController();
        return $controller;
    }
}