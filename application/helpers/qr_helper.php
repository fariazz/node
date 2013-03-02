<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * qr
 * 
 * @desc        create goole api qr code 
 * 
 * @param       int $size
 * @param       string $text 
 * @param       string $type 
 * 
 * @author      Alexander Makhno 
 * @version     1.0 19.02.2012 
 */
function qr($size, $text, $type = 'url') {
    
    $url = GOOGLE_QR_API."?chs={$size}x{$size}&cht=qr&chl=".urlencode($text); 
    
    switch ($type) {
        
        case 'url':

            $res = $url; 
            break;

        case 'img':
            
            $res = "<img src='$url' />"; 
            break;
    }
    
    return $res; 
}