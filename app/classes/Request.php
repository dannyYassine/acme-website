<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-28
 * Time: 10:43 AM
 */

namespace App\Classes;

class Request
{
    const GET = 'get';
    const POST = 'post';
    const FILE = 'file';

    /**
     * Returns all request from server
     * @param bool $is_array
     * @return mixed
     */
    public static function all($is_array = false)
    {
        $result = [];
        if (count($_GET) > 0) {
            $result[self::GET] = $_GET;
        }
        if (count($_POST) > 0) {
            $result[self::POST] = $_POST;
        }
        $result[self::FILE] = $_FILES;

        return json_decode(json_encode($result), $is_array);
    }

    /**
     * Get specific request type
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        $object = new static();
        $data = $object->all();

        return $data->{$key};
    }

    /**
     * Verifies if key exists as request type
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return array_key_exists($key, self::all(true));
    }

    /**
     * @param $key
     * @param $value
     * @return string
     */
    public static function old($key, $value)
    {
        $object = new static();
        $data = $object->all();

        return (isset($data->$key->$value)) ? $data->$key->$value : '';
    }

    /**
     * Refreshs all request types
     */
    public static function refresh()
    {
        $_GET = [];
        $_POST = [];
        $_FILES = [];
    }
}