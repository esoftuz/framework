<?php

namespace Esoft\Framework\traits;

use Esoft\Framework\Handlers\ConsoleHandler;
use Esoft\Framework\Router\Console\Router as ConsoleRouter;

trait CoreRoutes
{
    public function loadCoreRoutes(): void
    {
        ConsoleRouter::add('serve', [ConsoleHandler::class, 'handle']);
    }
}