<?php


namespace App\Controller;

use App\model\ConnexionDB;
use App\Entity\User;
use App\model\ConnexionUser;
use App\Controller\ErrorController;

use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use function PHPUnit\Framework\isEmpty;

class LoginController extends MainController
{
    private Environment $twig;
    private Session $session;
    private Request $request;
    private ErrorController $error;


    public function __construct()
    {
        $this->twig = parent::getTwig();
        $this->session = new Session();
        $this->request = Request::createFromGlobals();
        $this->error = new ErrorController();
    }

    /**
     * @return bool
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function logUser():bool
    {
        if ($this->request->get('submit') == '') {
            try {
                $user = new User($this->request->get('email'), $this->request->get('password'));

                $connexion = new ConnexionDB(
                    'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
                    "root",
                    "root"
                );
                $db = $connexion->openCon();
                $connexionResult = ConnexionUser::connectUser($user, $db);
                if (!$connexionResult) {
                    throw new \Exception('Bad Login');
                } else {
                    ConnexionUser::setLastLogin($user, $db);
                    ConnexionUser::initSession($user);
                    header('Location: ../../../../OnlineAdvisor/');
                    return true;
                }
            } catch (\Exception $e) {
                $this->error->get403($e->getMessage());
            }
        }

        return false;
    }

    public function logOut()
    {
        $this->session->clear();
        header('location: ../../../../OnlineAdvisor/');
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function get_logView()
    {
        if ($this->session->all() == []) {
            echo $this->twig->render('login/loginView.html.twig', ['Session' => $this->session->all()]);
            exit();
        }

        $this->error->get403('Already Connected');
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function get_signView()
    {
        echo $this->twig->render('login/signupView.html.twig', ['Session' => $this->session->all()]);
    }
}
