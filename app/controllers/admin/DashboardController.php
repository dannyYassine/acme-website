<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-25
 * Time: 8:36 AM
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Classes\Request;
use App\Classes\Session;
use App\Classes\SessionKey;

class DashboardController extends BaseController
{
    public function handle()
    {
        if (Session::has(SessionKey::ADMIN)) {
            $msg = Session::get(SessionKey::ADMIN);
        } else {
            $msg = 'Not defined';
        }

        view('admin/dashboard', ['admin' => $msg]);
    }

    public function view()
    {

    }

    public function get()
    {
        $data = Request::old('post', 'product');
        var_dump($data);
    }
}