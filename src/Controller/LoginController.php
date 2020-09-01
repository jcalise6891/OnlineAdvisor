<?php


namespace App\Controller;

use App\model\ConnexionDB;
use App\Entity\User;
use App\model\ConnexionUser;

class LoginController
{
    public static function logUser():bool
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
                    return true;
//                    header('Location: ../../../../OnlineAdvisor/');
                }
            } catch (\Exception $e) {
                echo 'Exception : ',$e->getMessage(),"<br>";
            }
        }
    }

    public function logOut()
    {
        if (isset($_SESSION['user'])) {
            session_start();
            session_destroy();
            header('location: ../../../../OnlineAdvisor/');
        }
        header('Location: ../../../../OnlineAdvisor/');
    }
}
