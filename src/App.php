<?php

namespace Esoftuz\Framework;

use Esoftuz\Framework\Exceptions\HttpNotFoundException;
use Esoftuz\Framework\Exceptions\CommandNotFoundException;
use Esoftuz\Framework\Router\Console\Router as ConsoleRouter;
use Esoftuz\Framework\Router\Web\Router as WebRouter;

final class App
{
    public string $type;

    use Traits\CoreRoutes;

    public function __construct(public readonly string $dir)
    {
    }

    /**
     * @throws HttpNotFoundException
     */
    public function run(): void
    {
        $this->type = 'web';
        $request = Request::get();
        $routes = WebRouter::routes();
        if (array_key_exists($request, $routes)) {
            $route = $routes[$request];
            $controller = $route[0];
            $method = $route[1];
            echo (new $controller())->$method(new Request());
        } else {
            throw new HttpNotFoundException();
        }
    }

    /**
     * @throws CommandNotFoundException
     */
    public function handle($args = []): void
    {
        $this->type = 'console';
        $method = $args[1];
        $this->loadCoreRoutes();
        $routes = ConsoleRouter::routes();
        if(array_key_exists($method, $routes))
        {
            $route = $routes[$method];
            $controller = $route[0];
            $method = $route[1];
            $args = array_slice($args, 2);
            echo (new $controller())->$method($args);
        }else{
            throw new CommandNotFoundException();
        }
    }
}