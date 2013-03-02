<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function ranking_data($key = 0) {
    
    $rankingOptions = array(

        1 => '1 - 100', 
        2 => '101 - 500', 
        3 => '501 - 1000', 
        4 => '1001 - 2000', 
    ); 

    if (in_array($key, array_keys($rankingOptions))) {
        
        return $rankingOptions[$key]; 
    }
    else {
        
        return $rankingOptions; 
    }
}

function getRankingLimitsByKey($key) {

    $rankingLimits = array(
        
        1 => array(
            
            'from'  => 1, 
            'to'    => 100, 
        ), 
        2 => array(
            
            'from'  => 101, 
            'to'    => 500, 
        ), 
        3 => array(
            
            'from'  => 501, 
            'to'    => 1000, 
        ), 
        4 => array(
            
            'from'  => 1001, 
            'to'    => 2000, 
        ), 
    ); 
    
    return $rankingLimits[$key]; 
}