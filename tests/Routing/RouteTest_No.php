<?php

namespace Routing;

use PHPUnit\Framework\TestCase;
use App\Routing\Router;

class RouteTestNo extends TestCase
{
//    public function modified_run($router)
//    {
//        foreach ($router->routes['GET'] as $route) {
//            if ($route->match($router->url)) {
//                return true;
//            }
//        }
//        return false;
//    }

    public function testInvalidUrl()
    {
        $routerTest = new Router('testInvalid');

        $routerTest->get('/test', function () {
        });

        $routerTest->get('/test-2', function () {
        });

        $result = $this->run();

        self::assertFalse($result);
    }


    public function testValidUrl()
    {
        $routerTest = new Router('test');

        $routerTest->get('/test', function () {
        });

        $routerTest->get('/test-2', function () {
        });

        $result = $this->run();

        self::assertTrue($result);
    }
};
