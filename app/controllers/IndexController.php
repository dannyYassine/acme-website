<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 5:57 PM
 */

namespace App\Controllers;

use App\Classes\Mail;
use Illuminate\Database\Capsule\Manager as Capsule;

interface IRoutableController {
    function handle();
    function view();
}

class IndexController extends BaseController
{
    public function handle()
    {
        echo 'hello';

        return parent::handle();
    }

    function view()
    {

    }

    function email()
    {
        $mail = new Mail();
        $data = [
            'to' => 'dannyyassine@gmail.com',
            'subject' => 'Welcome to the Acme Store',
            'view' => \ViewTemplate::WELCOME,
            'name' => 'John Doe',
            'body' => 'Testing email template'
        ];
        if ($mail->send($data)) {
            echo 'Email sent!';
        } else {
            echo 'Email failed';
        }
    }
}