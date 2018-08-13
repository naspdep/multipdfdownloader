<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProQuest
 *
 * @author Clara
 */
class ProQuest implements SpecialTreatment{
    
    private $data;
    private $logger;
    
    public function __construct() {
        $this->logger = new Logger();
    }
    
    public function getHTML($data) {
        $this->data = $data;
        $this->js();
        //:TODO: do some stuffs
        return $newData;
    }
    
    private function sendAccept() {
        //:TODO: send an accept request
        $url = '';
        
        //:TODO: get url
        $curlConnector = new curlConnector();
        $curlConnector->connect($url);
    }
    
    private function js () {
        //:TODO: deal with all the js bs
        
        $javaScriptParser = new JavaScriptParser();
        $javaScriptParser->parseData($this->data);
        $javaScriptParser->includeJs();
    }
}
