<?php


namespace App\Controller;

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

abstract class MainController
{
    protected static $twigInstance = null;


    protected static function getTwig(): Environment
    {

        if (is_null(self::$twigInstance)) {
            $templates = './src/view/';
            $loader = new FilesystemLoader($templates);
            self::$twigInstance = new Environment(
                $loader,
                ['cache' => false]
            );
        }

        return self::$twigInstance;
    }

    /**
     * rend impossible le clonage
     */
    private function __clone()
    {
    }
}
