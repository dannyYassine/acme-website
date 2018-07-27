<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-25
 * Time: 8:36 AM
 */

namespace App\Controllers;

use App\Classes\Session;
use App\Classes\SessionKey;

class DashboardController extends BaseController
{
    public function handle()
    {

        Session::add(SessionKey::ADMIN, 'You are here!');

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
}