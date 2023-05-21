<?php

namespace Esoftuz\Framework\Handlers;

class ConsoleHandler
{
    public function handle(): void
    {
        global $app;
        $dir = $app->dir . '/public';
        $command = "php -S localhost:8000 -t $dir";
        exec($command);
    }
}