<?php

require_once "../../vendor/autoload.php";

use App\model\ConnexionDB;
use App\model\SignUpUser;
use App\Entity\User;

class SignupController
{


    /**
     * @throws Exception In case of invalid password;
     */

    public static function signUp():bool
    {
        if (isset($_POST['submit'])) {
            if ($_POST['pass'] === $_POST['confirmpass']) {
                $newUser = new User($_POST['mail'], $_POST['pass'], $_POST['fullName']);
                $connexion = new ConnexionDB(
                    'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
                    "root",
                    "root"
                );
                $db = $connexion->openCon();
                return SignUpUser::UserInscription($newUser, $db);
            } else {
                throw new \Exception('Mot de passe différents');
            }
        }
    }
}
