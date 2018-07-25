<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-19
 * Time: 7:57 AM
 * @param $path
 * @param array $data
 */

class ViewTemplate {
    const WELCOME = 'welcome.php';
}

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

/**
 * Loads file to inject data in it
 * @param $filename
 * @param $data
 * @return string
 */
function make($filename, $data)
{
    // keys are not available variables in scope
    extract($data);

    ob_start();

    // include template
    include(__DIR__ . '/../../resources/views/email' . $filename);

    // get contents
    $contents = ob_get_contents();

    ob_end_clean();

    return $contents;
}