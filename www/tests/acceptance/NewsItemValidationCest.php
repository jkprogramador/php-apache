<?php

class NewsItemValidationCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/news/create');
    }

    public function shouldSeeTitleIsRequiredMessage(AcceptanceTester $I)
    {
        $I->submitForm('form', ['title' => '']);
        $I->see('The title field is required.');
    }

    public function shouldSeeTitleMustHaveAtLeastThreeCharactersMessage(AcceptanceTester $I)
    {
        $I->submitForm('form', ['title' => 'ab']);
        $I->see('The title field must be at least 3 characters in length.');
    }

    public function shouldSeeTitleMustHaveAtMostTwoHundredFiftyFiveCharactersMessage(AcceptanceTester $I)
    {
        $I->submitForm('form', ['title' => str_repeat('A', 256)]);
        $I->see('The title field cannot exceed 255 characters in length.');
    }

    public function shouldSeeBodyIsRequiredMessage(AcceptanceTester $I)
    {
        $I->submitForm('form', ['body' => '']);
        $I->see('The body field is required.');
    }
}
