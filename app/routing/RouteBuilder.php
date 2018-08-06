<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-08-06
 * Time: 7:41 AM
 */

namespace App\Routing;

class RouteBuilder
{
    private $base;
    private $path;

    public static function instance()
    {
        return new self();
    }

    public function setBase($base)
    {
        $this->base = "/" . $base;
        return $this;
    }

    public function addPath($path)
    {
        $newPath = "/" . $path;
        $this->path .= $newPath;
        return $this;
    }

    public function build()
    {
        return "".$this->base . $this->path;
    }
}