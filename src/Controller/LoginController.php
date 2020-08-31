<?php


namespace App\Controller;

use App\model\ConnexionDB;
use App\User;
use App\model\ConnexionUser;

class LoginController
{
    public static function logUser():bool
    {
        if (isset($_POST['submit'])) {
            try {
                $user = new User($_POST['email'], $_POST['password']);
                $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor", "root", "root");
                $db = $connexion->openCon();
                $connexionResult = ConnexionUser::connectUser($user, $db);
                if (!$connexionResult) {
                    echo "Mauvais login";
                    return false;
                } else {
                    header('Location: ../../../../OnlineAdvisor/');
                }
            } catch (Exception $e) {
                echo 'Exception : ',$e->getMessage(),"<br>";
            }
        }
    }

    public function logOut()
    {
        if (isset($_SESSION['userMail'])) {
            session_start();
            session_destroy();
            header('location: ../../../../OnlineAdvisor/');
        }
    }
}
