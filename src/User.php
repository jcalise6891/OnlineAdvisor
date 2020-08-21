<?php


namespace App;



class User
{
    private $mail;
    private $password;

    /**
     * User constructor.
     * @param $mail
     * @param $password
     */
    public function __construct($mail, $password)
    {
        $this->mail = $mail;
        $this->password = $password;
    }

    public function verifyUser($conDB){
        $sql = "SELECT * FROM user WHERE email = '$this->mail' AND password = '$this->password'";
        $query = $conDB->query($sql);
        $result = $query->fetchAll();

        if(count($result) == 0){
            require_once "../view/loginView.php";
            echo "<div class='alert alert-danger' role='alert'>Connexion Failed</div>";
        }
        else{
            require_once "../view/loginView.php";
            echo "<div class='alert alert-success' role='alert'>Connexion Success</div>";
        }
    }




}