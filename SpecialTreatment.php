<?php

/**
 * For sites that do something like use javascript or some crap like that
 */

interface SpecialTreatment {
    /**
     * Needs to generate HTML that can be used by the PdfDownloader
     * 
     * @param type $data
     * @return string new data
     */
    public function getHTML($data);
}
