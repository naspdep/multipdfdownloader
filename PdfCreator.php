<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdfCreator
 *
 * @author Clara
 */
class PdfCreator {
    const FILEPATH = 'pdf/';
    
    public function putEmTogether ($iban){
        $files = scandir(self::FILEPATH . 'tmp');
        $file_content = '';
        
        foreach ($files as $file) {
            //I might have to remove beginning of file
            $file_content .= file_get_contents($file);
        }
        
        if(!file_put_contents($file_content, self::FILEPATH . "$iban.pdf")) {
            printf ("Failed to put em together. The files will remain in the " . self::FILEPATH . "tmp folder.");
        } else {
            foreach ($files as $file) {
                unlink (self::FILEPATH . "tmp/$file");
            }
        }
        
        //remove all tmp files am Ende
    }
}
