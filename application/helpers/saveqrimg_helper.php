<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * saveqrimg
 * 
 * @desc        create goole api saveqrimg code 
 * 
 * @param       int $size
 * @param       string $text 
 * @param       string $type 
 * 
 * @author      Alexander Makhno 
 * @version     1.0 19.02.2012 
 */
function saveqrimg($id, $imgUrl) {

    $imgPath = getimgpath($id); 
    $data = file_get_contents($imgUrl); 
    
    $fp = fopen($imgPath, 'w');
    fwrite($fp, $data);
    fclose($fp);
}