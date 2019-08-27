<?php

require_once "src/emailReaper.php";

$url = 'https://www.google.com';

$reaper = new carloF\EmailReaper($url);

$reaper->printEmails();

?>
