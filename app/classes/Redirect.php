<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-27
 * Time: 7:42 AM
 */

namespace App\Classes;

class Redirect
{
    /**
     * Redirect to specific page
     * @param $page
     */
    public static function to($page)
    {
        header("location: $page");
    }

    /**
     * Redirect to same page
     */
    public static function back()
    {
        $uri = $_SERVER['REQUEST_URI'];
        header("location: $uri");
    }
}