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
    
    public function getHTML($data) {
        $this->data = $data;
        $javaScriptParser = new JavaScriptParser();
        $javaScriptParser->parseData($data);
        $javaScriptParser->includeJs();
        
        //:TODO: do some stuffs
        return $newData;
    }
    
    private function sendAccept() {
        //:TODO: send an accept request
    }
    
    private function js () {
        //:TODO: deal with all the js bs
    }
}
