<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Test Installer form');

// Cleared old emails from MailCatcher
//$I->resetEmails();

$I->amOnPage('/installer');
$I->see('#CVEPDB CMS');

// check last mail
//$I->seeInLastEmail("Sometimes all you want is to send a simple HTML email with a basic design.");

$I->fillField('CORE_SITE_NAME', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce convallis felis risus, a accumsan arcu tincidunt eget. Nulla malesuada ipsum in risus auctor, eget porttitor urna rutrum. Donec leo nulla, porta vitae consectetur nec, venenatis in ante metus.');
$I->click('Install');
$I->see('This field must be at least 254 characters long');
