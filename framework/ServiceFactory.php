<?php

/*******************************************************************************
 * Service Factory Class
 * ---------------------
 * Creates an instance of a class and it stores it
 * in an array. If the class already has an instance,
 * it returns that existing instance from the cache
 * array
 ******************************************************************************/
class ServiceFactory
{
    public static $cache = array();

    public function create( $name, $args )
    {
        if ( array_key_exists($name, self::$cache) === false )
        {
            $name = ucfirst($name);

            $class = new ReflectionClass($name);
            self::$cache[$name] = $class->newInstanceArgs($args);
            
            //self::$cache[$name] = new $name($args);
        }
        return self::$cache[$name];
    }
}