<?php


namespace App\model;

use App\Entity\User;
use DateTime;
use Symfony\Component\HttpFoundation\Session\Session;


class ConnexionUser
{
    public static function connectUser(User $user, \PDO $db):bool
    {
        $sql = 'SELECT *
                FROM user
                WHERE email = :userMail';

        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));

        if ($query->execute(array(':userMail' => $user->get_UserMail()))) {
            $result = $query->fetch();
            $user->set_UserFullName($result['fullname']);

            if ($user->passHashCompare($result['password'])) {
                $user->set_Status();
                return true;
            }
        }
        return false;
    }

    public static function setLastLogin(User $user, \PDO $db)
    {
        $date = new DateTime();
        $setDateTime = $date->format('Y-m-d H:i:s');
        $dateTimeUpdateRequest = "UPDATE user
                                         SET lastlog = :dateTime 
                                         WHERE email = :userMail";
        $query = $db->prepare($dateTimeUpdateRequest, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->execute(array(':dateTime' => $setDateTime, ':userMail' => $user->get_UserMail()));
    }

    public static function initSession(User $user)
    {
        $user->clearPassword();

        $session = new Session();
        $session->start();
        $session->set('user', $user);
    }
}
