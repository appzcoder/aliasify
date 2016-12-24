<?php

namespace Appzcoder\Aliasify;

use RuntimeException;

abstract class Facade
{

    protected static $resolvedInstance;

    public static function getFacadeRoot()
    {
        if (null === static::$resolvedInstance) {
            $obj = static::getFacadeAccessor();
            static::$resolvedInstance = new $obj();
        }

        return static::$resolvedInstance;
    }

    protected static function getFacadeAccessor()
    {
        throw new RuntimeException('Facade does not implement getFacadeAccessor method.');
    }

    public static function __callStatic($method, $args)
    {

        $instance = static::getFacadeRoot();

        switch (count($args)) {
            case 0:
                return $instance->$method();
            case 1:
                return $instance->$method($args[0]);
            case 2:
                return $instance->$method($args[0], $args[1]);
            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);
            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);
            default:
                return call_user_func_array([$instance, $method], $args);
        }

    }

}
