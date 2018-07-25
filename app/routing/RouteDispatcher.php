<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-21
 * Time: 6:10 PM
 */

namespace App\Routing;

use AltoRouter;

class RouteDispatcher
{
    protected $match;
    protected $controller;
    protected $method;

    public function __construct(AltoRouter $router)
    {
        $this->match = $router->match();

        if ($this->match) {
            list($controller, $method) = explode('@', $this->match['target']);
            $this->controller = $controller;
            $this->method = $method;

            if (is_callable(array(new $this->controller, $this->method))) {
                call_user_func_array(array(new $this->controller, $this->method), array($this->method['params']));
            } else {
                echo 'This method {$this->method} is not defined in ${$this->controller}';
            }
        } else {
            view('error/404');
        }
    }
}