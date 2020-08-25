<?php


namespace App;



use Exception;
use phpDocumentor\Reflection\Types\Boolean;

class User
{
    private $mail;
    private $password;

    /**
     * User constructor.
     * @param $mail
     * @param $password
     * @throws Exception In case of Invalid Mail or Password
     */
    public function __construct($mail, $password)
    {
        $this->verifyMail($mail);
        $this->mail = $mail;

        $this->verifyPassword($password);
        $this->password = $password;
    }

    public function get_UserMail(){
        return $this->mail;
    }

    public function get_UserPass(){
        return $this->password;
    }

    /**
     * @param String $mail
     * @param String $password
     * @return User
     * @throws Exception In case of Invalid Mail or Password
     */

    public static function fromString(String $mail, String $password): self{
        return new self($mail, $password);
    }

    /**
     * @param String $mail
     * @throws Exception In case Email isn't valid
     */
    public function verifyMail(String $mail){
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            throw new Exception('Email is invalid');
        }
    }

    /**
     * @param String $password
     * @throws Exception In case Password isn't valid
     */

    public function verifyPassword(String $password){
        if(!isset($password)){
            throw new Exception('Password is Empty');
        }
        elseif(strlen($password) < 8 || strlen($password) > 32){
            throw new Exception('Password length is not valid');
        }
    }


}