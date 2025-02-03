<?php
class Request
{
    private static $request;

    public static function init()
    {
        self::$request = json_decode(file_get_contents('php://input'), true);
    }

    public static function POST($key)
    {
        return self::$request[$key];
    }

    public static function checkKeys($keys)
    {
        foreach($keys as $key) {
            if(!array_key_exists($key, self::$request)) {
                return false;
            }
        }
        return true;
    }
}
Request::init();