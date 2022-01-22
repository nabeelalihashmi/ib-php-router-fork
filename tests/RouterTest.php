<?php

namespace Buki\Tests;

use Buki\Router\Router;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class RouterTest extends TestCase
{
    protected $router;

    protected $request;

    protected function setUp(): void
    {
        error_reporting(E_ALL);
        $this->request = Request::createFromGlobals();
        $this->router = new Router(
            [],
            $this->request
        );

        // Clear SCRIPT_NAME because bramus/router tries to guess the subfolder the script is run in
        $this->request->server->set('SCRIPT_NAME', '/index.php');
        $this->request->server->set('SCRIPT_FILENAME', '/index.php');

        // Default request method to GET
        $this->request->server->set('REQUEST_METHOD', 'GET');

        // Default SERVER_PROTOCOL method to HTTP/1.1
        $this->request->server->set('SERVER_PROTOCOL', 'HTTP/1.1');
    }

    protected function tearDown(): void
    {
        // nothing
    }

    public function testInit()
    {
        $this->assertInstanceOf('\Buki\Router\Router', $this->router);
    }

    public function testRouteCount()
    {
        $this->router->get('/', 'HomeController@main');
        $this->router->get('/contact', 'HomeController@contact');
        $this->router->get('/about', 'HomeController@about');

        $this->assertCount(3, $this->router->getRoutes(), "doesn't contains 2 routes");
    }
}
