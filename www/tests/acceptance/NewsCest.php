<?php

class NewsCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/news');
    }

    public function shouldHaveOkStatusCode(AcceptanceTester $I)
    {
        $I->seeResponseCodeIs(200);
    }

    public function shouldHaveCorrectTitle(AcceptanceTester $I)
    {
        $I->seeInTitle('News archive');
    }

    public function shouldDisplayAllNews(AcceptanceTester $I)
    {
        $I->see('Elvis sighted');
        $I->see('Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.');

        $I->see('Say it isn\'t so');
        $I->see('Scientists conclude that some programmers have a sense of humor.');

        $I->see('Caffeination, Yes!');
        $I->see('World\'s largest coffee shop open onsite nested coffee shop for staff only.');
    }

    public function shouldDisplayLinksToNewsItems(AcceptanceTester $I)
    {
        $I->seeLink('View article', '/news/elvis-sighted');
        $I->seeLink('View article', '/news/say-it-isnt-so');
        $I->seeLink('View article', '/news/caffeination-yes');
    }

    public function shouldNotHaveIncorrectContent(AcceptanceTester $I)
    {
        $I->dontSee('I should not be on this page.');
    }
}
