<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getUrlContent($url) {
    
    $c = curl_init ();  
    curl_setopt ($c, CURLOPT_URL, $url);  
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, 1);  
    //curl_setopt ($c, CURLOPT_FOLLOWLOCATION, 1);
    $r = curl_exec ($c);  
    curl_close ($c); 
    
    return $r; 
}