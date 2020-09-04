<?php


namespace App\Controller;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;



class ErrorController extends MainController
{
    private Environment $twig;
    private Session $session;
    private Response $response;

    public function __construct()
    {
        $this->twig = parent::getTwig();
        $this->session = new Session();
        $this->response = new Response();
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function get404(string $message)
    {
        echo $this->twig->render('./error/404.html.twig', ['Message' => $message,'Session' => $this->session->all()]);
        $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
        $this->response->send();
    }

    /**
     * @param string $message
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function get403(string $message)
    {
        echo $this->twig->render('./error/403.html.twig', ['Message' => $message ,'Session' => $this->session->all()]);
        $this->response->setStatusCode(Response::HTTP_FORBIDDEN);
        $this->response->send();
    }
}
