<?php


$regex = "/[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/i";

$opts = getopt("u:h::");

if(isset($opts["u"])){
    $url = $opts["u"];
} elseif(isset($opts["h"])) {
    print("EmailReaper\nHelps you harvest email from a web page\nRequired option:\n-u : [URL]");
    exit;  
} else {
    print("Error: missing 'u'[URL] parameter\nCorrect command example: php emailReaper.php -u https://www.google.com");
    exit;
}


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$web_page = curl_exec($curl);
curl_close($curl);

$res = preg_match_all($regex,$web_page,$matches, PREG_PATTERN_ORDER, 0);
                if ($res) {
                    $result = array_unique($matches[0]);
                } else {
                    die ('No emails found');
                }

$total_emails = count ($result);

echo "+== $total_emails email/s found ==+\n";
echo "|\n";
foreach ($result as $key => $email)
{
    echo "| ".($key+1).". $email\n";
}
echo "|\n";
echo "+====================+\n";
