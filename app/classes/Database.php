<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-22
 * Time: 11:10 AM
 */

namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;
// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{

    public function __construct()
    {
        $db = new Capsule();
        $db->addConnection([
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_NAME'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ]);

        $db->setEventDispatcher(new Dispatcher(new Container));

        $db->setAsGlobal();
        $db->bootEloquent();
    }
}