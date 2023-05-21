<?php

namespace Esoft\Framework;

class Request
{
    public static function get(): string
    {
        return explode("?", trim($_SERVER['REQUEST_URI'], "/"))[0];
    }

    public function all(): array
    {
        return $_REQUEST;
    }
}