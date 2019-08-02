<?php

require_once "emailReaper.php";

$url = 'url-to-search-for-emails';

$reaper = new carloF\EmailReaper($url);

$reaper->printEmail();

?>
