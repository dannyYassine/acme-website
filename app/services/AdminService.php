<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-26
 * Time: 10:11 PM
 */

namespace App\Services;

use App\Classes\HandleRoutable;

class AdminService implements HandleRoutable
{
    public function __construct()
    {

    }

    public function handle()
    {
        echo 'Admin';
    }
}