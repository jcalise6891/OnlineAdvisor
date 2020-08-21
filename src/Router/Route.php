<?php


namespace App;


class Route
{
    private $path;
    private $callable;

    /**
     * Route constructor.
     * @param $path
     * @param $callable
     */
    public function __construct($path, $callable){
        $this->path = $path;
        $this->callable = $callable;
    }
}