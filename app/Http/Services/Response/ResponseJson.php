<?php
/**
 * Created by PhpStorm.
 * User: Pouya Teymoorian
 * Date: 7/21/2019
 * Time: 10:06 AM
 */

namespace App\Http\Services\Response;


class ResponseJson
{
    public static $code = 1;
    public static $message = 'successfully';
    public static $data = "";

    public static function code($code)
    {
        static::$code = $code;
        return new static;
    }

    public static function message($message)
    {
        static::$message = $message;
        return new static;
    }

    public static function data($data)
    {
        static::$data = $data;
        return new static;
    }

    public static function get()
    {
        return response()->json([
            'code' => static::$code,
            'message' => static::$message,
            'data' => static::$data,
        ]);
    }
}