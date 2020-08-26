<?php


namespace App;

use Exception;

class User
{
    private $mail;
    private $password;
    private $fullName;

    /**
     * User constructor.
     * @param $mail
     * @param $password
     * @param string $fullName
     * @throws Exception In case of Invalid Mail or Password
     */
    public function __construct($mail, $password, $fullName = "Default")
    {
        $this->verifyMail($mail);
        $this->mail = $mail;

        $this->verifyPassword($password);
        $this->password = $password;

        if ($fullName != 'Default') {
            $this->verifyFullName($fullName);
            $this->fullName = $fullName;
        }
    }

    public function get_UserMail()
    {
        return $this->mail;
    }

    public function get_UserPass()
    {
        return $this->password;
    }

    public function get_UserFullName()
    {
        return $this->fullName;
    }

    /**
     * @param String $mail
     * @param String $password
     * @param String $fullName
     * @return User
     * @throws Exception In case of Invalid Mail or Password
     */

    public static function fromString(String $mail, String $password, String $fullName = "Default"): self
    {
        if ($fullName == "Default") {
            return new self($mail, $password);
        } else {
            return new self($mail, $password, $fullName);
        }
    }

    /**
     * @param String $mail
     * @throws Exception In case Email isn't valid
     */
    public function verifyMail(String $mail)
    {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email is invalid');
        }
    }

    /**
     * @param String $password
     * @throws Exception In case Password isn't valid
     */

    public function verifyPassword(String $password)
    {
        if (!isset($password)) {
            throw new Exception('Password is Empty');
        } elseif (strlen($password) < 8 || strlen($password) > 32) {
            throw new Exception('Password length is not valid');
        }
    }

    /**
     * @param String $fullName
     * @throws Exception In case FullName isn't valid
     */

    public function verifyFullName(String $fullName)
    {
        if (!isset($fullName)) {
            throw new Exception('FullName is empty');
        } elseif (strlen($fullName) < 1 || preg_match('#^([A-Za-zÀ-ÖØ-öø-ÿ]+([ ]?[a-z]?[\'-]?[A-Za-zÀ-ÖØ-öø-ÿ]+)*)$#', $fullName) == 0) {
            throw new Exception('FullName is Invalid');
        }
    }
}
