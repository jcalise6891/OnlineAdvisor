<?php

namespace tests\Model;

use App\model\ConnexionDB;
use App\model\ConnexionUser;
use PHPUnit\Framework\TestCase;
use App\Entity\User;

class ConnexionUserTest extends TestCase
{
    public function testUserNameIsInvalid()
    {
        $fakeUser = $this->createMock(User::class);
        $fakeUser->method('get_userMail')->willReturn('test@test.com');


        $stmtMock = $this->createMock(\PDOStatement::class);
        $pdoMock = $this->createMock(\PDO::class);

        $stmtMock->method('execute')->willReturn(false);
        $pdoMock->method('prepare')->willReturn($stmtMock);

        $test = ConnexionUser::connectUser($fakeUser, $pdoMock);

        self::assertFalse($test);
    }

    public function testUserNameIsValid()
    {
        $fakeUser = $this->createMock(User::class);
        $fakeUser->method('get_userMail')->willReturn('test@test.com');
        $fakeUser->method('passHashCompare')->willReturn(true);

        $fakeArray['password'] = 'fakePassword';
        $fakeArray['fullname'] = 'fakeName';


        $stmtMock = $this->createMock(\PDOStatement::class);
        $pdoMock = $this->createMock(\PDO::class);

        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('fetch')->willReturn($fakeArray);
        $pdoMock->method('prepare')->willReturn($stmtMock);

        $test = ConnexionUser::connectUser($fakeUser, $pdoMock);

        self::assertTrue($test);
    }

    public function testUserPasswordIsInvalid()
    {
        $fakeUser = $this->createMock(User::class);
        $fakeUser->method('get_userMail')->willReturn('test@test.com');
        $fakeUser->method('passHashCompare')->willReturn(false);

        $fakeArray['password'] = 'fakePassword';
        $fakeArray['fullname'] = 'fakeName';


        $stmtMock = $this->createMock(\PDOStatement::class);
        $pdoMock = $this->createMock(\PDO::class);

        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('fetch')->willReturn($fakeArray);
        $pdoMock->method('prepare')->willReturn($stmtMock);

        $test = ConnexionUser::connectUser($fakeUser, $pdoMock);

        self::assertfalse($test);
    }

    public function testUserPasswordIsValid()
    {
        $fakeUser = $this->createMock(User::class);
        $fakeUser->method('get_userMail')->willReturn('test@test.com');
        $fakeUser->method('passHashCompare')->willReturn(true);

        $fakeArray['password'] = 'fakePassword';
        $fakeArray['fullname'] = 'fakeName';


        $stmtMock = $this->createMock(\PDOStatement::class);
        $pdoMock = $this->createMock(\PDO::class);

        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('fetch')->willReturn($fakeArray);
        $pdoMock->method('prepare')->willReturn($stmtMock);

        $test = ConnexionUser::connectUser($fakeUser, $pdoMock);

        self::asserttrue($test);
    }

    public function XDateIsUpdated()
    {
        $fakeUser= $this->createMock(User::class);
        $fakeUser->method('get_userMail')->willReturn('test@test.com');

    }
}
