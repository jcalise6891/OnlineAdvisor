<?php


namespace App\model;

use App\User;
use DateTime;

class ConnexionUser
{
    public static function connectUser(User $user, \PDO $db):bool
    {
        $user_mail = $user->get_UserMail();
        $user_pass = $user->get_UserPass();

        $sql = "SELECT * FROM user WHERE email = '$user_mail' AND password = '$user_pass'";
        $query = $db->query($sql);
        $result = $query->fetchAll();



        if (count($result) == 0) {
//            echo "<div class='alert alert-danger' role='alert'>Connexion Failed</div>";
//            require_once(__DIR__.'\view\loginView.php');
            return false;
        } else {
//            echo "<div class='alert alert-success' role='alert'>Connexion Success</div>";
//            require_once(__DIR__.'\view\loginView.php');


            $date = new DateTime();
            $setDateTime = $date->format('Y-m-d H:i:s');
            $dateTimeUpdateRequest = "UPDATE user SET lastlog = '$setDateTime' WHERE email = '$user_mail'";
            $db->query($dateTimeUpdateRequest);


            return true;
        }
    }
}
