<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function setlang($lang = 'en') {
    
    $parts = explode("/", current_url()); 
    $parts[3] = $lang; 
    $url = implode("/", $parts); 
    return $url; 
}