<?php

class PdfDownloader {
    const TMP_FILEPATH = 'pdf/tmp';
    
    private $downloadLinks = array();
    
    /**
     * Parse HTML for any pdf download link
     * Note that you might have to prepare the HTML with a SpecialTreatment class
     * 
     * @param string $data
     * @param string $baseurl
     */
    private function getDownloadLinks ($data, $baseurl) {
        
        //parse for <a
        $links = array ();
        //preg_match_all('/<a.*href=[\'"].*\.pdf .*>/', $data, $links);
        
        preg_match_all('/<a.*href=[\'"](.*\.pdf)[\'"].*/', $data, $links);
        
        foreach ($links[1] as $link) {
            if ($link[0] === '/') {
                $this->downloadLinks[] = $baseurl . $link;
            } else {
                $this->downloadLinks[] = $link;
            }
        }
    }
    
    /**
     * Download all the found links into the tmp folder
     * 
     * @param string $data
     * @return string potential name for the file, should be IBAN
     */
    public function downloadTmps($data,$baseurl) {
        
        $this->getDownloadLinks($data,$baseurl);
        
        $iban = '';
        
        foreach ($this->downloadLinks as $num => $downloadlink) {
            echo '<br />';
            if (preg_match('/\.pdf$/', $downloadlink)) {
                if (!$iban) {
                    preg_match('/[A-Fa-f\d]{4}\-[A-Fa-f\d](\-[A-Fa-f\d]{4}){2}\-[A-Fa-f\d]/', $downloadlink, $iban);
                    $iban = $iban[0];
                }
                file_put_contents(self::TMP_FILEPATH . "/$num.pdf", file_get_contents($downloadlink));
            } else {
                //what to do, what to do... idk yet
            }
        }
        
        return ($iban ? $iban : 'please_name_this_file');
    }
}
