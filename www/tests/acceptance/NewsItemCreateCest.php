<?php

class NewsItemCreateCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/news/create');
        $form = [
            'title' => 'Lorem ipsum',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec elit massa.'
        ];
        $I->submitForm('form', $form);
    }

    public function shouldHaveOkStatusCode(AcceptanceTester $I)
    {
        $I->seeResponseCodeIs(200);
    }

    public function shouldSeeSameUrl(AcceptanceTester $I)
    {
        $I->seeCurrentUrlEquals('/news/create');
    }

    public function shouldSeeSuccessMessage(AcceptanceTester $I)
    {
        $I->see('News item created successfully');
    }
}
