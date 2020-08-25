<?php

namespace App\tests;

use App\User;
use App\ConnexionDB;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @throws \Exception In case of Invalid Mail or Password
     */

    public function test_CanBeCreatedFromValidEmailAddress(){
        $this->assertInstanceOf(
            User::class,
                    User::fromString('user@test.com','12345678')

        );
    }

    public function test_CannotBeCreatedFromInvalidEmailAddress(){
        $this->expectException(\Exception::class);
        User::fromString('','123456');
    }

    public function test_PasswordCannotBeEmpty(){
        $this->expectException(\Exception::class);
        User::fromString('user@test.com','');
    }

    public function test_PasswordCannotBeUnderEightCharOrOverThirtyChar(){
        $this->expectException(\Exception::class);
        User::fromString('user@test.com','1234');
    }
}
