<?php

namespace App;

use PDO;


class ConnexionDB{

    private $dsn;
    private $userName;
    private $password;

    /**
     * Connexion constructor.
     * @param $m_dsn
     */

    public function __construct($m_dsn){
        $this->dsn = $m_dsn;
    }

    public function openCon(){
        return new PDO($this->dsn,$this->userName,$this->password);
    }
}