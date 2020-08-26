<?php

use App\model\ConnexionDB;
use App\model\ConnexionUser;
use App\User;
use PHPUnit\Framework\TestCase;

class ConnexionTest extends TestCase
{
    public function testUsernameIsInvalid()
    {
        $user = new User('test@mail.com', '12345678');
        $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor", "root", "root");
        $db = $connexion->openCon();

        self::assertFalse(ConnexionUser::connectUser($user, $db));
    }

    public function testUsernameIsValid()
    {
        $user = new User('julien.calise@orange.fr', '12345678');
        $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor", "root", "root");
        $db = $connexion->openCon();

        self::assertTrue(ConnexionUser::connectUser($user, $db));
    }

    public function testPasswordIsInvalid()
    {
        $user = new User('julien.calise@orange.fr', '12345679');
        $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor", "root", "root");
        $db = $connexion->openCon();

        self::assertFalse(ConnexionUser::connectUser($user, $db));
    }

    public function testPasswordIsValid()
    {
        $user = new User('julien.calise@orange.fr', '12345678');
        $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor", "root", "root");
        $db = $connexion->openCon();

        self::assertTrue(ConnexionUser::connectUser($user, $db));
    }
}
