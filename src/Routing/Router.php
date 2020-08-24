<?php


namespace App\Routing;


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

    /**
     * @throws RouterException in case there is no route matching.
     */

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {

            if($route->match($this->url)) {
               return $route->call();
            }
        }

        require_once (dirname(__FILE__,2).'\assets\php\404.php');
    }
}