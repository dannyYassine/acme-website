<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 5:57 PM
 */

namespace App\Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;

interface IRoutableController {
    function handle();
    function view();
}

class IndexController extends BaseController implements IRoutableController
{
    public function show($params)
    {

        $users = Capsule::table('users')->where('id', '=', 1)->first();

        var_dump($users);

        echo 'Helloo from ' . __CLASS__ . $params;
    }

    function handle()
    {

    }

    function view()
    {

    }
}