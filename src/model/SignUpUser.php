<?php

namespace App\model;

use App\User;
use App\model\ConnexionDB;

class SignUpUser
{
    public static function UserInscription(User $user, PDO $db) :bool
    {
        $user_firstName = $user->get_UserFirstName();
        $user_lastName = $user->get_UserLastName();
        $user_mail = $user->get_UserMail();
        $user_pass = $user->get_UserPass();



        return $resultat;
    }
}
