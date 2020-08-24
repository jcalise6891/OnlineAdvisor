<?php

use PHPUnit\Framework\TestCase;
use App\Routing\Route;
use App\Routing\Router;
use App\Routing\RouterException;

class RouteTest extends TestCase
{
    public function test_CannotBeAnInvalidUrl(){
        $routerTest = new Router('InvalidTest');

        $routerTest->get('/test', function(){

        });

      $result = $routerTest->run();


    }
};
