<?php

function abort($code = 500, $message = "Internal server error"): string
{
    http_response_code($code);
    return view('error', compact('message'));
}

function view($name, $args = []): string
{
    global $app;
    $dir = match($app->type)
    {
        'web' => __DIR__ . '/../views/',
        'console' => __DIR__ . '/views/'
    };

    $view = file_get_contents($dir . $name . '.view.php');

    foreach($args as $key => $value)
    $view = preg_replace("/{{\s" . $key . "\s}}/m", $value, $view);

    return $view;
}

function dd(...$data): void
{
    http_response_code(500);
    var_dump(...$data);
    die(500);
}

function get_args(): array
{
    global $argv;
    return $argv;
}