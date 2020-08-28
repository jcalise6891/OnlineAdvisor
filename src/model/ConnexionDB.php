<?php

namespace App\model;

use PDO;

class ConnexionDB
{
    private $dsn;
    private $userName;
    private $password;

    /**
     * Connexion constructor.
     * @param $db_dsn
     * @param $db_UserName
     * @param $db_Password
     */

    public function __construct($db_dsn, $db_UserName, $db_Password)
    {
        $this->verifyDsn($db_dsn);
        $this->dsn = $db_dsn;

        $this->userName = $db_UserName;
        $this->password = $db_Password;
    }

    public function openCon()
    {
        return new PDO($this->dsn, $this->userName, $this->password, [\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC]);
    }

    public static function fromString(String $dsn, String $username, String $password)
    {
        return new self($dsn, $username, $password);
    }

    public function verifyDsn(String $dsn)
    {
        if ($dsn != "mysql:host=localhost;dbname=online_advisor") {
            throw new \InvalidArgumentException('DSN is invalid');
        }
    }
}
