<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * getimgpath 
 * 
 * @desc        get img dir name 
 * 
 * @param       int $id
 * @param       string $text 
 * @param       string $type 
 * 
 * @author      Alexander Makhno 
 * @version     1.0 12:14 13.07.2012 
 */
function getimgpath($id, $web = FALSE) {

    // get dir name 
    $dirName = strval(floor($id / IMG_COUNT_IN_DIR)); 
    
    // check if dir exists 
    $dirPath = QRIMG_PATH.DIRECTORY_SEPARATOR.$dirName; 
    if (is_dir($dirPath) == FALSE) {
    
        // create dir 
        $dirCreated = mkdir($dirPath); 
        if ($dirCreated == FALSE) {
            
            echo "error: cannot create dir $dirName"; exit(); 
        }
    }
    
    // return url for web or file link for php code 
    if ($web) {

        $imgPath = base_url()."www/qr/$dirName/$id.png"; 
    }
    else {

        $imgPath = QRIMG_PATH.DIRECTORY_SEPARATOR.$dirName.DIRECTORY_SEPARATOR."$id.png"; 
    }

    return $imgPath; 
}