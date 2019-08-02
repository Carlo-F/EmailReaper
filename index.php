<?php

require_once "emailReaper.php";

$url = 'http://www.unplitoscana.it/PROLOCO/Provin/prolocgr.htm';

$reaper = new carloF\EmailReaper($url);

$reaper->printEmail();

?>
