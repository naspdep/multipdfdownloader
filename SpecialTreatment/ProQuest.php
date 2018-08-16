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
    
    const ROOT = 'https://ebookcentral.proquest.com/';
    
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
        $javaScriptParser->parseData($this->data, self::ROOT);
        $javaScriptParser->includeJs();
        
        //include jQuery
        
        //get links with id tool_chapterdownload, they trigger a click and a keypress event
        /*
         * click:
         * function(e) {
  e.preventDefault();
  var eType = e.type;
  if (eType == 'click' || (eType == 'keypress' && (e.which == 13 || e.which == 32))) {
    var tmpEle = $(this);
    var ele = tmpEle.attr("id").split("_");
    localDocID = ele[2];
    chapterName = tmpEle.attr("data-chName");
    localChapterID = ele[4];
    pageNumber = ele[3];

    generalChaptDownloadModal(e, localDocID, localChapterID, chapterName, pageNumber);
  }
}
         keypress: function(e) {
  e.preventDefault();
  var eType = e.type;
  if (eType == 'click' || (eType == 'keypress' && (e.which == 13 || e.which == 32))) {
    var tmpEle = $(this);
    var ele = tmpEle.attr("id").split("_");
    localDocID = ele[2];
    chapterName = tmpEle.attr("data-chName");
    localChapterID = ele[4];
    pageNumber = ele[3];

    generalChaptDownloadModal(e, localDocID, localChapterID, chapterName, pageNumber);
  }
}*/
    }
}
