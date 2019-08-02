<?php
/**
 * EMAILREAPER
 * 
 * A single-class PHP library to extract emails from webpage or plain text file.
 * 
 * PHP support 5.3+
 * 
 * @version     1.0.0
 * @author      https://www.carlof.it
 * @link        https://github.com/Carlo-F/EmailReaper
 * @license     MIT
 */
namespace carloF;

class EmailReaper
{
    /**
     * @var string The source file to scan
     */
    protected $sourceFile;

    /**
     * @var array The list of all found emails
     */
    protected $emails = [];

    /**
     *
     * @param string $src represents the source file path
     *
     */
    public function __construct(string $src)
    {
        $this->sourceFile = $src;
        $this->harvest();
    }

    /**
     * Perform the email harvest
     *
     * @return $this
     */
    protected function harvest()
    {
        $file=file_get_contents($this->sourceFile);
        $res = preg_match_all("/[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/i",$file,$matches);
        if ($res) {
            return $this->emails = array_unique($matches[0]);
        }
        else{
            return null;
        }
    }

    /**
     * get email list
     *
     *
     * @return array
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Print the list of found emails to screen
     *
     *
     * @return string
     */
    public function printEmails()
    {
        $list = $this->emails;

        if($list != null){
            echo "=============== ". count($list) ." Found from: ". $this->sourceFile ." ================";
            echo "<br />";
            foreach($list as $email) {
              echo $email . "<br />";
            }
            echo "=============== by emailR34P3R ===============";
          }
          else {
              echo "No emails found.";
          }
    }

    /**
     * Save the list in a file
     *
     * @param string $destFile the file where to save the list in
     *
     */
    public function exportEmails(string $destFile)
    {
        $list = $this->emails;

        $txtFile = fopen($destFile, "a") or die("Unable to open file!");

        $txt = "=============== ". count($list) ." Found from: ". $this->sourceFile ." ===============";

        fwrite($txtFile, $txt."\r\n");
        foreach($list as $email) {
          fwrite($txtFile, $email."\r\n");
        }
        $txt = "=============== by emailR34P3R ===============";
        fwrite($txtFile, $txt."\r\n");

        fclose($txtFile);
    }
}