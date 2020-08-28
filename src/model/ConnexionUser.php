<?php


namespace App\model;

use App\User;
use DateTime;

class ConnexionUser
{
    public static function connectUser(User $user, \PDO $db):bool
    {
        $user_mail = $user->get_UserMail();

        $sql = 'SELECT *
                FROM user
                WHERE email = :usermail';

        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->execute(array(':usermail' => $user_mail));


        $result = $query->fetch();

        if (count($result) == 0) {
            return false;
        } else {
            if ($user->passHashCompare($result['password'])) {
                $date = new DateTime();
                $setDateTime = $date->format('Y-m-d H:i:s');
                $dateTimeUpdateRequest = "UPDATE user
                                         SET lastlog = ':dateTime' 
                                         WHERE email = ':usermail'";
                $query = $db->prepare($dateTimeUpdateRequest, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $query->execute(array(':dateTime' => $setDateTime, ':usermail' => $user_mail));


                $_SESSION['userMail'] = $user->get_UserMail();
                $_SESSION['fullName'] = $user->get_UserFullName();

                return true;
            } else {
                return false;
            }
        }
    }
}
