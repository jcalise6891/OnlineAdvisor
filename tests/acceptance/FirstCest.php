<?php

use \Codeception\Step\Argument\PasswordArgument;
use \Codeception\Util\HttpCode;

class FirstCest
{

    // tests
    public function tryWithValidLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
//        $I->acceptPopup();
        $I->fillField('Email address', 'test@test.com');
        $I->fillField('Password', new PasswordArgument('12345678'));
        $I->click('Submit');
//        $I->acceptPopup();
        $I->see('Bienvenue');
    }

    /**
     * @param AcceptanceTester $I
     * @throws \Codeception\Exception\ModuleException
     */
    public function tryHomePage(AcceptanceTester  $I)
    {
        $I->amOnPage('/postsdq');
        $I->seeResponseCodeIs('404');
    }

    /**
     * @param AcceptanceTester $I
     * @throws Exception
     */

//    public function tryLogOut(AcceptanceTester $I)
//    {
//        $I->amOnPage('/login');
//        $I->fillField('Email address', 'test@test.com');
//        $I->fillField('Password', new PasswordArgument('12345678'));
//        $I->click('Submit');
//        $I->see('Bienvenue');
//        $I->click('h1');
//        $I->amOnPage('/post/1');
//        $I->click('#logOut');
//        $I->dontSee('Bienvenue');
//    }
}
