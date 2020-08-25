<?php

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @throws \Exception In case of Invalid Mail
     */

    public function testEmailIsValid(){
        $this->assertInstanceOf(
            User::class,
                    User::fromString('user@test.com','12345678')

        );
    }

    public function testEmailIsInvalid(){
        $this->expectException(\Exception::class);
        User::fromString('','123456');
    }

    /**
     * @throws \Exception In case of Invalid Password
     */

    public function testPasswordWithValidLength(){
        $this->assertInstanceOf(
            User::class,
            User::fromString('user@test.com','12345678910')
        );
    }

    public function testPasswordIsEmpty(){
        $this->expectException(\Exception::class);
        User::fromString('user@test.com','');
    }

    public function testPasswordWithInvalidLength(){
        $this->expectException(\Exception::class);
        User::fromString('user@test.com','1234');
    }
}
