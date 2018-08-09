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
    private function getDownloadLinks ($data, $baseurl = 'localhost') {
        
        //parse for <a
        foreach (preg_match_all('/<a .* href=[\'"]([\w\/_\-])*\.pdf .*>/', $data) as $link) {
            if (preg_match('/<a .* href=[\'"]\//', $link)) {
                $this->downloadLinks[] = $baseurl . substr(preg_match('/href[\'"].*[\'"]/', $link), 4);
            } else {
                $this->downloadLinks[] = $link . substr(preg_match('/href[\'"].*[\'"]/', $link), 4);
            }
        }
    }
    
    /**
     * Download all the found links into the tmp folder
     * 
     * @param string $data
     * @return string potential name for the file, should be IBAN
     */
    public function downloadTmps($data) {
        $this->getDownloadLinks($data);
        $iban = '';
        
        foreach ($this->downloadLinks as $num => $downloadlink) {
            if (preg_match('/\.pdf$/', $downloadlink)) {
                $iban ? : $iban = preg_match('/[\a-fA-F]{4}\-[\a-fA-F]\-[\a-fA-F]{4}\-[\a-fA-F]{4}\-[\a-fA-F]\-/', $downloadlink);
                file_put_contents(self::TMP_FILEPATH . "$num.pdf", file_get_contents($downloadlink));
            } else {
                //what to do, what to do... idk yet
            }
        }
        return ($iban != '' ? $iban : 'please_name_this_file');
    }
}
