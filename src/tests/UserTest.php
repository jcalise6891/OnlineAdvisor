<?php

namespace App\tests;

use App\User;
use App\ConnexionDB;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{


    public function test_VerificationUser(){


        $this->userTest->verifyUser();
    }
}
