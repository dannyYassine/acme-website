<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 5:57 PM
 */

namespace App\Controllers;

class BaseController implements IRoutableController
{
    public function __construct()
    {

    }

    function handle()
    {
        return $this;
    }

    function view()
    {

    }
}