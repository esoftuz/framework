<?php

namespace Esoftuz\Framework\traits;

use Esoftuz\Framework\Handlers\ConsoleHandler;
use Esoftuz\Framework\Router\Console\Router as ConsoleRouter;

trait CoreRoutes
{
    public function loadCoreRoutes(): void
    {
        ConsoleRouter::add('serve', [ConsoleHandler::class, 'handle']);
    }
}