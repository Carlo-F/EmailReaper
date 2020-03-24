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

$reaper->**getEmails()** - return an array of found emails.

$reaper->**printEmails()** - echoes a list of found emails.

$reaper->**exportEmails($destFile)** - save the list in a file ($destFile)
