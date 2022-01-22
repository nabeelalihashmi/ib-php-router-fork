<?php

namespace Buki\Tests\Example\Middlewares;

use Buki\Router\Http\Middleware;

class TestMiddleware extends Middleware
{
    public function handle(): bool
    {
        return true;
    }
}