<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function clean(array $data) {
    
    $res = array(); 
    if (!empty($data)) {
        
        foreach ($data as $key => $value) {
            
            $res[$key] = addslashes($value); 
        }
    }
    
    return $res; 
}