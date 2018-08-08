<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of curlConnector
 *
 * @author Clara
 */
class curlConnector {
    private $curl;
    
    private $curlopts = array (
        CURLOPT_TRANSFER => 1,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_POST =>  1
    );
    
    public function __construct() {
        $this->curl = curl_init();
    }
    
    public function connect($url) {
        curl_setopt_array($this->curl, $this->curlopts);
        curl_setopt($this->curl, CURLOPT_URL, $url);
        $data = curl_exec($this->curl);
        curl_close($this->curl);
        return $data;
    }
}
