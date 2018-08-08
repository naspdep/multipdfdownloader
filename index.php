<?php
/**
 * @author Jennifer Talks
 * @version 0.0.2
 */
require_once '_autoloader.php';

if (filter_input(INPUT_GET, 'url')) {
    $curlConnector = new curlConnector();
    $pdfDownloader = new PdfDownloader();
    $pdfCreator = new PdfCreator();
    
    $data = $curlConnector->connect(filter_input(INPUT_GET, 'url'));
    $iban = $pdfDownloader->downloadTmps($data);
    $pdfCreator->putEmTogether($iban);
}

require_once 'form.html';