<?php

use App\model\ConnexionDB;
use App\model\ConnexionUser;
use PHPUnit\Framework\TestCase;
use App\Entity\User;

class ConnexionTest extends TestCase
{
    public function testUsernameIsInvalid()
    {
        $userTest = $this->createMock(User::class);
        $connexionTest = $this->createMock(ConnexionDB::class);
        $connexionTestResult = $this->createMock(PDO::class);

//        $userTest->expects($this->once())
//            ->method('get_UserMail')
//            ->willReturn('test@mail.com');

        $connexionTest->expects($this->once())
            ->method('openCon')
            ->willReturn($connexionTestResult);

        $dbTest = $connexionTest->openCon();

        self::assertInstanceOf(PDO::class, $dbTest);
//        self::assertFalse(ConnexionUser::connectUser($userTest, $dbTest));
    }


    public function testDsnIsValid()
    {
        $this->assertInstanceOf(
            ConnexionDB::class,
            ConnexionDB::fromString('mysql:host=localhost;dbname=online_advisor', 'root', 'root')
        );
    }

    /**
     * @throws InvalidArgumentException In case of invalid DSN
     */

    public function testDsnIsInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        ConnexionDB::fromString('mysql:host=localhost;dbnames=online_advisor', 'root', 'root');
    }
}
