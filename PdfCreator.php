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
        $file_content = '';
        
        //Gather all the content
        foreach ($files as $file) {
            //I might have to remove beginning of file
            if (preg_match('/\.pdf$/', $file)) {
                $file_content .= file_get_contents($file);
            }
        }
        
        //Put the content down
        if(!file_put_contents($file_content, self::FILEPATH . "$filename.pdf")) {
            printf ("Failed to put em together. The files will remain in the " . self::FILEPATH . "tmp folder.");
        } else {
            //delete tmp folder
            foreach ($files as $file) {
                unlink (self::FILEPATH . "tmp/$file");
            }
        }
        
        //remove all tmp files am Ende
    }
}
