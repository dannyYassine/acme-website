<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-19
 * Time: 7:57 AM
 * @param $path
 * @param array $data
 */


/**
 * @param $path
 * @param array $data
 */
function view($path, array $data = [])
{
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';

    $blade = new \Philo\Blade\Blade($view, $cache);

    echo $blade
            ->view()
            ->make($path, $data)
            ->render();
}