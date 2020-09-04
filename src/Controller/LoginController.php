<?php


namespace App\Controller;

use App\model\ConnexionDB;
use App\Entity\User;
use App\model\ConnexionUser;

use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class LoginController extends MainController
{
    private Environment $twig;
    private Session $session;


    public function __construct()
    {
        $this->twig = parent::getTwig();
        $this->session = new Session();
    }

    public function logUser():bool
    {
        if (isset($_POST['submit'])) {
            try {
                $user = new User($_POST['email'], $_POST['password']);
                $connexion = new ConnexionDB(
                    'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
                    "root",
                    "root"
                );
                $db = $connexion->openCon();
                $connexionResult = ConnexionUser::connectUser($user, $db);
                if (!$connexionResult) {
                    echo "bad login";
                    return false;
                } else {
                    ConnexionUser::setLastLogin($user, $db);
                    ConnexionUser::initSession($user);
                    header('Location: ../../../../OnlineAdvisor/');
                    return true;
                }
            } catch (\Exception $e) {
                echo 'Exception : ',$e->getMessage(),"<br>";
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
        echo $this->twig->render('login/loginView.html.twig', ['Session' => $this->session->all()]);
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
