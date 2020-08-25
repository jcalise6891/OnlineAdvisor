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

        require_once(__DIR__.'\view\loginView.php');

        if(count($result) == 0){
            echo "<div class='alert alert-danger' role='alert'>Connexion Failed</div>";
            return false;
        }
        else{
            echo "<div class='alert alert-success' role='alert'>Connexion Success</div>";
            return true;
        }
    }




}