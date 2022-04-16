<?php

class NewsItemCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/news/caffeination-yes');
    }

    public function shouldHaveOkStatusCode(AcceptanceTester $I)
    {
        $I->seeResponseCodeIs(200);
    }

    public function shouldHaveCorrectTitle(AcceptanceTester $I)
    {
        $I->seeInTitle('News | Caffeination, Yes!');
    }

    public function shouldHaveCorrectContent(AcceptanceTester $I)
    {
        $I->see('World\'s largest coffee shop open onsite nested coffee shop for staff only.');
    }

    public function shouldNotHaveIncorrectContent(AcceptanceTester $I)
    {
        $I->dontSee('I should not be on this page.');
    }
}
