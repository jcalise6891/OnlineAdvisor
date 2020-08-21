<?php


namespace App\router;


class Router
{
    private $url;
    private $routes = [];

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path,$callable){
        $route = new Route($path,$callable);
        $this->routes['GET'][] = $route;
    }

    public function post($path,$callable){
        $route = new Route($path,$callable);
        $this->routes['POST'][] = $route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('No routes matches');
        }
    }
}