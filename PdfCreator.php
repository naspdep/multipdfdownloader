<?php

class PdfCreator {
    const FILEPATH = 'pdf/';
    
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
            echo exec("$cmd 2>&1"); //Is empty string if successfull
        }
        
        //Put the content down
        if(!file_exists(self::FILEPATH . "/$filename.pdf")) {
            printf ("Failed to put em together. The files will remain in the " . self::FILEPATH . "tmp folder.");
        } else {
            //delete tmp folder
            foreach ($files as $file) {
                unlink (self::FILEPATH . "tmp/$file");
            }
        }
    }
}
