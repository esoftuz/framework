<?php

namespace Esoft\Framework\Handlers;

class ConsoleHandler
{
    public function handle(): void
    {
        $dir = __DIR__ . '/../../public';
        $command = "php -S localhost:8000 -t $dir";
        exec($command);
    }
}