<?php
require_once 'SpecialTreatment.php';

foreach (scandir('SpecialTreatment') as $file) {
    require_once "SpecialTreatment/$file";
}

require_once 'curlConnector.php';
require_once 'PdfCreator.php';
require_once 'PdfDownloader.php';
