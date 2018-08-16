<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JavaScriptParser
 *
 * @author Clara
 */
class JavaScriptParser {
    
    private $logger;
    
    public function __construct() {
        $this->logger = new Logger();
    }
    
    /**
     * parse HTML for .js links and <script type='text/javascript' tags and write 
     * them into a file
     * 
     * @param string $data HTML
     */
    public function parseData($data, $root = '') {
        //parse for <script tags
        $matches = array();
        preg_match_all("/<script.*>(\n[^<]*)*<\/script>/i", $data, $matches);
        
        $fh = fopen ('tmp/js.html','w');
        try {
            if ($fh) {
                foreach ($matches[0] as $match) {
                    $srcpos = strpos($match, 'src="');
                    if ($srcpos === FALSE) {
                        $srcpos = strpos($match, "src='");
                    }
                    if (($srcpos !== FALSE) && ($root) && (substr($match, $srcpos + 5, strlen($root) - 1) !== $root)) { //Regex has problems with slashes
                        $match = str_replace('src="', 'src="' . $root, str_replace("src='", "src='$root", $match));
                    }
                    fwrite($fh, $match . PHP_EOL);
                }
            } else {
                throw new FailedToOpenFileException();
            }
        } catch (FailedToOpenFileException $e) {
            die($e->errorMessage());
        } finally {
            fclose ($fh);
        }
    }
    
    /**
     * Attempts to execute a javascript function
     * 
     * @param type $function
     * @param type $params
     */
    public function callJsFunction ($function, $params) {
        
        //:TODO: handle relative paths
        echo "<script type='text/javascript'>"
        . "$function($params)" //might have to go through params one by one
        . "</script>";
    }
    
    public function includeJs () {
        require_once 'tmp/js.html';
    }
}
