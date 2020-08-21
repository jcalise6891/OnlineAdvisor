<?php


namespace App;


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

    }
}