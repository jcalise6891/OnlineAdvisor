<?php

use App\Controller\LoginController;
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{
    public function testLogUserIsPossible()
    {
        $_POST['submit'];
        LoginController::logUser();
    }
}
