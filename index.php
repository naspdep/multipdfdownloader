<?php
/**
 * @author Jennifer Talks
 * @version 0.1.0
 * 
 * index file
 */

/**
 * Get valid HTML
 * 
 * @param string $data HTML
 * @param SpecialTreatment $specialTreatment
 * @return string
 */
function getHTML ($data, SpecialTreatment $specialTreatment) {
    return $specialTreatment->getHTML($data);
}


require_once '_autoloader.php';

if (filter_input(INPUT_GET, 'url')) {
    $curlConnector = new curlConnector();
    $pdfDownloader = new PdfDownloader();
    $pdfCreator = new PdfCreator();
    
    $data = $curlConnector->connect(filter_input(INPUT_GET, 'url'));
    
    //Figure out which SpecialTreatment class to use
    preg_match('/^.*\.(com)|(de)/', filter_input(INPUT_GET, 'url'), $match);
    switch ($match[0]) {
        case 'https://ebookcentral.proquest.com' :
            $data = getHTML($data, new ProQuest());
            break;
    }
    
    $iban = $pdfDownloader->downloadTmps($data, $match[0]);
    $pdfCreator->putEmTogether($iban);
}

require_once 'html/header.html';
require_once 'html/form.html';
require_once 'html/footer.html';