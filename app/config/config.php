<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 7:30 PM
 */

class Config
{
    public static function host()
    {
        return getenv('HOST');
    }
}