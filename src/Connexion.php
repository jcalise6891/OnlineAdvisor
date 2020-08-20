<?php

namespace App;

use PDO;


class Connexion{

    private $dsn;
    private $userName;
    private $password;

    /**
     * Connexion constructor.
     */
    public function __construct($m_dsn,$m_userName,$m_password){
        $this->dsn = $m_dsn;
        $this->userName = $m_userName;
        $this->password = $m_password;
    }

    public function openCon(){
        return new PDO($this->dsn,$this->userName,$this->password);
    }
}