<?php
/**
 * Loads all required classes. Just in case I need to explain that.
 */

require_once 'Config.php';
foreach (scandir('Exceptions') as $file) {
    if (preg_match('/\.php$/', $file)) {
        require_once "Exceptions/$file";
    }
}

require_once 'SpecialTreatment.php';

foreach (scandir('SpecialTreatment') as $file) {
    if (preg_match('/\.php$/', $file)) {
        require_once "SpecialTreatment/$file";
    }
}

require_once 'curlConnector.php';
require_once 'PdfCreator.php';
require_once 'PdfDownloader.php';
