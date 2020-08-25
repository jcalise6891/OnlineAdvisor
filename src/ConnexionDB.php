<?php

namespace App;

use PDO;


class ConnexionDB{

    private $dsn;
    private $userName;
    private $password;

    /**
     * Connexion constructor.
     * @param $db_dsn
     * @param $db_UserName
     * @param $db_Password
     */

    public function __construct($db_dsn,$db_UserName,$db_Password){
        $this->dsn = $db_dsn;
        $this->userName = $db_UserName;
        $this->password = $db_Password;
    }

    public function openCon(){
        return new PDO($this->dsn,$this->userName,$this->password);
    }
}