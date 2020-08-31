<?php

namespace App\model;

use App\Entity\User;

class SignUpUser
{
    public static function UserInscription(User $user, \PDO $db) :bool
    {
        $user_fullName = $user->get_UserFullName();
        $user_mail = $user->get_UserMail();

        $noDuplicate = self::verifyDuplicate($user_mail, $db);
        if ($noDuplicate) {
            $sql = 'INSERT INTO user (email,password,fullname)
                    VALUES (:userMail, :userPass, :userFullName)';
            $query = $db->prepare($sql);
            $query->bindValue(':userMail', $user_mail, \PDO::PARAM_STR);
            $query->bindValue(':userPass', $user->passHash(), \PDO::PARAM_STR);
            $query->bindValue(':userFullName', $user_fullName, \PDO::PARAM_STR);
            $testResult =$query->execute();

            var_dump($testResult);

            return true;
        } else {
            throw new \Exception('Le mail existe déjà');
        }
    }

    private static function verifyDuplicate(string $userMail, \PDO $db):bool
    {
        $sql = 'SELECT user.email
                FROM user
                WHERE email = :newUserMail';

        $query = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $query->execute(array(':newUserMail' => $userMail));

        $result = $query->fetch();

        if (!$result) {
            return true;
        } else {
            return false;
        }
    }
}
