<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-08-11
 * Time: 1:50 PM
 */

$router->map(
    'GET',
    '/api/php_info',
    function () {
        phpinfo();
    },
    'api_php_info');