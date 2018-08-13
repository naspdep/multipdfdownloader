<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logger
 *
 * @author Clara
 */
class Logger {
    const LOGPATH = 'log/';
    const LOG_FILE = self::LOGPATH . 'log.log';
    const ERROR_FILE = self::LOGPATH . 'error.log';
    const DEBUG_FILE = self::LOGPATH . 'debug.log';
    
    /**
     * logMessage
     * 
     * @param string $message
     * @param int $level (0 -> Notice, 1 -> WARNING, 2 -> ERROR, 3 -> DEBUG)
     */
    private function logMessage($message, $level) {
        
        $mLevel = '';
        $file = '';
        
        switch ($level) {
            case 0:
                $mLevel = 'NOTICE';
                $file = self::LOG_FILE;
                break;
            case 1: 
                $mLevel = 'WARNING';
                $file = self::ERROR_FILE;
                break;
            case 2:
                $mLevel = 'ERROR';
                $file = self::ERROR_FILE;
                break;
            case 3:
                $mLevel = 'DEBUG';
                $file = self::DEBUG_FILE;
                break;
            default :
                $mLevel = 'UNKNOWN';
                $file = self::LOG_FILE;
                break;
        }
        
        $fh = fopen($file, 'a');
        fwrite($fh, sprintf('%s [%s] %s', date("D, d-M-Y H:i:s "), $mLevel, $message));
        fclose($fh);
    }
    
    public function notice ($message) {
        $this->logMessage($message, 0);
    }
    
    public function warning ($message) {
        $this->logMessage($message, 1);
    }
    
    public function error ($message) {
        $this->logMessage($message, 2);
    }
    
    public function debug ($message) {
        if (Config::DEBUG) {
            $this->logMessage($message, 3);
        }
    }
}
