<?php

/**
 * Manages the curl requests
 */

class curlConnector {
    private $curl;
    private $logger;
    
    private $curlopts = array (
        //CURLOPT_TRANSFER => 1,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_POST =>  1,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => false
    );
    
    /**
     * Constructor; initialises curl
     */
    public function __construct() {
        $this->logger = new Logger();
        $this->curl = curl_init();
    }
    
    /**
     * Sends a curl requests and returns an HTML string
     * 
     * @param string $url
     * @return string
     */
    public function connect($url) {
        curl_setopt_array($this->curl, $this->curlopts);
        curl_setopt($this->curl, CURLOPT_URL, $url);
        $data = curl_exec($this->curl);
        
        if(!$data) {
            $this->logger->error("Failed to connect to $url");
        }
        
        curl_close($this->curl);
        return $data;
    }
    
    /**
     * Sets given curl option
     * 
     * @param int $option
     * @param mixed $value
     */
    public function setOpt($option, $value) {
        curl_setopt($this->curl, $option, $value);
    }
}
