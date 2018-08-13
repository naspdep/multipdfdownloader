<?php

class PdfCreator {
    const FILEPATH = 'pdf/';
    
    private $logger;
    
    public function __construct() {
        $this->logger = new Logger();
    }

        /**
     * Attempts to take the content of all pdf files in tmp folder and put them
     * into one file
     * 
     * @param string $filename
     */
    public function putEmTogether ($filename){
        $files = scandir(self::FILEPATH . 'tmp');
        
        $cmd = 'pdftk.exe';
        if (Config::PDFTK_FILEPATH) {
            $cmd = Config::PDFTK_FILEPATH . $cmd;
        }
        
        //Gather all the content
        foreach ($files as $num => $file) {
            if (preg_match('/\.pdf$/', $file)) {
                $cmd .= " " . self::FILEPATH . "tmp/$file";
            } else {
                unset ($files[$num]);
            }
        }
        
        if ($cmd !== 'pdftk') { //Tests if there are any input files
            $cmd .= ' output ' . self::FILEPATH . "$filename.pdf";
            $o = exec("$cmd 2>&1"); 
            if ($o) {
                $this->logger->warning($o);
            }
        }
        
        //Put the content down
        if(!file_exists(self::FILEPATH . "/$filename.pdf")) {
            $this->logger->warning("Failed to put em together. The files will "
                    . "remain in the ". self::FILEPATH . "tmp folder, and we "
                    . "will attempt to create a zip archive.");
            require_once 'Zipper.php';
            $zipper = new Zipper();
            $zipper->zipEm($filename);
            
        } else {
            //delete tmp folder
            foreach ($files as $file) {
                unlink (self::FILEPATH . "tmp/$file");
            }
        }
    }
}
