<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function translateit($data) {
    
    $ci =& get_instance();
    
    foreach ($data as $item) {
        
        $res[] = $ci->lang->language[$item]; 
    }
    
    return $res; 
}