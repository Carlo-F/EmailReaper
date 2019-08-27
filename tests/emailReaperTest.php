<?php

require_once "src/emailReaper.php";

use PHPUnit\Framework\TestCase;

class emailReaperTest extends TestCase
{
    public function testResultArray ()
    {
        $reaper = new carloF\EmailReaper('https://www.artcache.it');

        $this->assertCount(1, $reaper->getEmails());
    }

    public function testEmptyArray ()
    {
        $reaper = new carloF\EmailReaper('https://www.google.com');

        $this->assertEmpty($reaper->getEmails());
    }

    public function testPrintEmailsReturnsNoEmails ()
    {
        $reaper = new carloF\EmailReaper('https://www.google.com');

        $reaper->printEmails();

        $this->expectOutputString("No emails found.");
    }
}