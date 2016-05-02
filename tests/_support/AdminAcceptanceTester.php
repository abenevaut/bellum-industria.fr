<?php

/**
 * Class AdminAcceptanceTester
 */
class AdminAcceptanceTester extends AcceptanceTester
{
    public function login()
    {
        // if snapshot exists - skipping login
//        if ($this->loadSessionSnapshot('login')) {
//            return;
//        }

        // logging in
        $this->amOnPage('/admin/login');
        $this->fillField('email', 'antoine@cvepdb.fr');
        $this->fillField('password', 'CMK7kodQ');
        $this->click('Sign In');

        // saving snapshot
        $this->saveSessionSnapshot('login');
    }
}
