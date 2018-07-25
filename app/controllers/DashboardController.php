<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-25
 * Time: 8:36 AM
 */

class DashboardController extends \App\Controllers\BaseController
{
    public function handle()
    {
        view('admin/dashboard');
    }
}