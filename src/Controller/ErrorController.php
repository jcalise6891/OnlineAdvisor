<?php


namespace App\Controller;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ErrorController extends MainController
{
    private Environment $twig;

    public function __construct()
    {
        $this->twig = parent::getTwig();
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function get404()
    {
        echo $this->twig->render('./error/404.html.twig', []);
    }
}
