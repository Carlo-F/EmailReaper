# EMAILREAPER 

## A single-class PHP library to extract emails from webpage or plain text file.

### HOW TO USE IT
copy & paste the following code
```
require_once "emailReaper.php";

$url = 'url-to-search-for-emails'; // url or the path to the file

$reaper = new carloF\EmailReaper($url);
```

### PUBLIC METHODS

$reaper->**getEmails()** - return the list (array) of emails found.

$reaper->**printEmails()** - echoes the list of emails found.

$reaper->**exportEmails($destFile)** - save the list in a file ($destFile)
