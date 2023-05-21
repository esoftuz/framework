<?php

namespace Esoftuz\Framework\traits;

trait RouterTrait
{
    public static function add($request, $method): void
    {
        self::$routes[$request] = $method;
    }

    public static function routes(): array
    {
        return self::$routes;
    }
}