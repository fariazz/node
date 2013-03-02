<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function checkResult(array $post) {
    
    $ci =& get_instance();
    
    $setWonPlayer1 = array(
        
        '6:0', 
        '6:1', 
        '6:2', 
        '6:3', 
        '6:4', 
        '7:5', 
        '7:6', 
    ); 
    
    $setWonPlayer2 = array(
        
        '0:6', 
        '1:6', 
        '2:6', 
        '3:6', 
        '4:6', 
        '5:7', 
        '6:7', 
    ); 
    
    $setCountWonPlayer1 = 0; 
    $setCountWonPlayer2 = 0; 
    
    // player 1 
    if (in_array($post['set1'], $setWonPlayer1)) {
        
        $setCountWonPlayer1++; 
    }
    
    if (in_array($post['set2'], $setWonPlayer1)) {
        
        $setCountWonPlayer1++; 
    }

    if (in_array($post['set3'], $setWonPlayer1)) {
        
        $setCountWonPlayer1++; 
    }
    
    // player 2 
    if (in_array($post['set1'], $setWonPlayer2)) {
        
        $setCountWonPlayer2++; 
    }
    
    if (in_array($post['set2'], $setWonPlayer2)) {
        
        $setCountWonPlayer2++; 
    }

    if (in_array($post['set3'], $setWonPlayer2)) {
        
        $setCountWonPlayer2++; 
    }
    
    // get winner 
    $winnerPlayer = 0; 
    
    if ($setCountWonPlayer1 >= 2) {
        
        $winnerPlayer = 1; 
    }
    elseif ($setCountWonPlayer2 >= 2) {
        
        $winnerPlayer = 2; 
    }
    
    return $winnerPlayer; 
}