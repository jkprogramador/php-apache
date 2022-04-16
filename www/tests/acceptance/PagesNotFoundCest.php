<?php

class PagesNotFoundCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/donotexist');
    }

    public function shouldHaveNotFoundStatusCode(AcceptanceTester $I)
    {
        $I->seeResponseCodeIs(404);
    }
}
