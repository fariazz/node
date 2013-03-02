<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function updateMatchStatByUserId($userId, $matchId) {
    
    $ci =& get_instance();
    
    // match played 
    $matchPlayed = $ci->match_model->countUserMatch($userId); 
    $matchPlayed = $matchPlayed['count']; 
    
    // match won 
    $matchWon = $ci->match_model->getWonMatchByUserId($userId); 
    $matchWon = $matchWon['total_count']; 
    
    // match lost 
    $matchLost = $ci->match_model->getLostMatchByUserId($userId); 
    $matchLost = $matchLost['total_count']; 
    
    // set won 
    $countSetWon = $ci->match_model->countPlayerSetWonLost($userId, TRUE); 
    
    // set lost 
    $countSetLost = $ci->match_model->countPlayerSetWonLost($userId, FALSE); 
    
    // game won 
    $countGameWon = $ci->match_model->countPlayerGameWonLost($userId, TRUE); 
    
    // game lost  
    $countGameLost = $ci->match_model->countPlayerGameWonLost($userId, FALSE); 

    // rank 
    $rank = calculateRank($userId); 

    // update stat table 
    $data = array(
        
        'match_played' => $matchPlayed, 
        'match_won' => $matchWon, 
        'match_lost' => $matchLost, 
        'set_won' => $countSetWon, 
        'set_lost' => $countSetLost, 
        'game_won' => $countGameWon, 
        'game_lost' => $countGameLost, 
        'total_ranking_point' => $rank, 
    ); 

    $ci->matchtotal_model->updateMatchtotal($userId, $data); 
}