<?php

class NewsItemNotFoundCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/news/non-existent-news');
    }

    public function shouldHaveNotFoundStatusCode(AcceptanceTester $I)
    {
        $I->seeResponseCodeIs(404);
    }
}
