<?php

class PagesCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/home');
    }

    public function shouldHaveOkStatusCode(AcceptanceTester $I)
    {
        $I->seeResponseCodeIs(200);
    }

    public function shouldHaveTitleAsPageNameWithFirstCharacterUppercased(AcceptanceTester $I)
    {
        $I->seeInTitle('Home');
    }

    public function shouldHaveCorrectContent(AcceptanceTester $I)
    {
        $I->see('This is the homepage for the Pages section.');
    }

    public function shouldNotHaveIncorrectContent(AcceptanceTester $I)
    {
        $I->dontSee('I should not be on this page.');
    }
}
