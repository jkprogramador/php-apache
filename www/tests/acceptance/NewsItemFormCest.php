<?php

class NewsItemFormCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/news/create');
    }

    public function shouldHaveOkStatusCode(AcceptanceTester $I)
    {
        $I->seeResponseCodeIs(200);
    }

    public function shouldHaveCorrectTitle(AcceptanceTester $I)
    {
        $I->seeInTitle('Create a news item');
    }

    public function shouldHaveFieldForTitle(AcceptanceTester $I)
    {
        $I->seeElement('input', ['name' => 'title']);
    }

    public function shouldHaveFieldForBody(AcceptanceTester $I)
    {
        $I->seeElement('textarea', ['name' => 'body']);
    }

    public function shouldHaveHiddenCsrfToken(AcceptanceTester $I)
    {
        $I->seeElement('input', ['type' => 'hidden', 'name' => 'csrf_test_name']);
    }

    public function shouldHaveButtonToSendTheForm(AcceptanceTester $I)
    {
        $I->seeElement('input', ['type' => 'submit']);
    }
}
