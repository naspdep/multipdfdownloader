<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdfDownloader
 *
 * @author Clara
 */
class PdfDownloader {
    const TMP_FILEPATH = 'pdf/tmp';
    
    private $downloadLinks = array();
    
    public function __construct() {
        
    }
    
    private function getDownloadLinks ($data, $baseurl = 'localhost') {
        //parse data for links
        //contains class "pdf-link", get href
        
        //parse for <a
        
        foreach (preg_match_all('/<a .* href=[\'"]([\w\/_\-])*\.pdf .*>/', $data) as $link) {
            if (preg_match('/<a .* href=[\'"]\//', $link)) {
                $this->downloadLinks[] = $baseurl . substr(preg_match('/href[\'"].*[\'"]/', $link), 4);
            } else {
                $this->downloadLinks[] = $link . substr(preg_match('/href[\'"].*[\'"]/', $link), 4);
            }
        }
        //get href
        //check for "pdf-link" oder ".pdf"
    }
    
    public function downloadTmps($data) {
        $this->getDownloadLinks($data);
        $iban = '';
        
        foreach ($this->downloadLinks as $num => $downloadlink) {
            if (preg_match('/\.pdf$/', $downloadlink)) {
                $iban = preg_match('/[\a-fA-F]{4}\-[\a-fA-F]\-[\a-fA-F]{4}\-[\a-fA-F]{4}\-[\a-fA-F]\-/', $downloadlink);
                file_put_contents(self::TMP_FILEPATH . "$num.pdf", file_get_contents($downloadlink));
            } else {
                //what to do, what to do... idk yet
            }
        }
        return $iban;
    }
}
