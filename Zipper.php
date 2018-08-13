<?php
/**
 * This class should only come to use if the merging fails; in that case,
 * it will attempt to put the tmps into a downloadable zip file
 */
class Zipper {
    const PDF_PATH = 'pdf/';
    private $ziparchive;
    
    public function __construct() {
        $this->ziparchive = new ZipArchive();
        $this->logger = new Logger();
    }
    
    public function zipEm ($filename) {
        $files = scandir(self::PDF_PATH . 'tmp');
        //:TODO: Create zip archive
        
        if($this->ziparchive->open(self::PDF_PATH . "$filename.zip", ZipArchive::CREATE)) {
            foreach ($files as $file) {
                if (preg_match('/\.pdf$/', $file)) {
                    $this->ziparchive->addFile(self::PDF_PATH . 'tmp/' . $file);
                }
            }
            $this->ziparchive->close();
        } else {
            $this->logger->error("Failed to create zip archive");
        }
    }
}
