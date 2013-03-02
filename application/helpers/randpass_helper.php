<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function randpass() {

    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $alphabetCount = mb_strlen($alphabet) - 1; 
    
    for ($i = 0; $i < 8; $i++) {
        
        $n = rand(0, $alphabetCount);
        $pass[$i] = $alphabet[$n];
    }
    $passLine = implode("", $pass); 
    
    return $passLine;
}
