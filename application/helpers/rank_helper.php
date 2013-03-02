<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Ranking update: 
For every vitory: 	10 points
For every loss:		-5 points
For Every set won	5 points
For every game won	1 point

For example: Novak Djokovic plays agains Roger Federer, and the game ends 
6:3, 5:7, 6:3 in this case we have the following situation: 

Novak Djokoovic has won the game		10 Points
Novak Djokoovic has won 2 sets		2x5 Points = 10 Points
Novak Djokovic has won 17 games		17 Points
Update ranking-> add 37 points

Roger Federer has lost 1 match			-5 points
He has won 1 set:				+5 points
Roger Feder has won 13 games			+13 points
Update ranking-> add 13 points

No player can have negative ranking points. Minum ranking points are 0 (zero)
 */
function calculateRank($userId) {
    
    $ci =& get_instance();
    
    // result array 
    $setWonByUser1 = array(
        
        '6:0', '6:1', '6:2', '6:3', '6:4', '7:5', '7:6', 
    ); 
    
    $setWonByUser2 = array(
        
        '0:6', '1:6', '2:6', '3:6', '4:6', '5:7', '6:7', 
    ); 
    
    $rank = 0; 
    
    // for every vitory 
    $wonGames = $ci->match_model->getWonMatchByUserId($userId); 
    $wonGames = $wonGames['total_count']; 
    $rank += $wonGames * FOR_EVERY_VITORY_RANK; 
    
    // for every loss 
    $lossGames = $ci->match_model->getLostMatchByUserId($userId); 
    $lossGames = $lossGames['total_count']; 
    $rank += $lossGames * FOR_EVERY_LOSS_RANK; 
    
    // for every set won and for every game won 
    
    // count when user number is 1 in game and then when user number is 2 in game 
    $gameListUser1 = $ci->match_model->getConfirmedAllGamesByUserId(1, $userId); 
    $gameListUser2 = $ci->match_model->getConfirmedAllGamesByUserId(2, $userId); 
    
    $setWonCountUser1 = 0; 
    $setGameCountUser1 = 0; 
    if (!empty($gameListUser1)) {
        
        foreach ($gameListUser1 as $game) {
            
            // count set 
            if (in_array("{$game['set1_p1']}:{$game['set1_p2']}", $setWonByUser1)) { $setWonCountUser1++; }
            if (in_array("{$game['set2_p1']}:{$game['set2_p2']}", $setWonByUser1)) { $setWonCountUser1++; }
            if (in_array("{$game['set3_p1']}:{$game['set3_p2']}", $setWonByUser1)) { $setWonCountUser1++; }
            
            // count game 
            $setGameCountUser1 = $game['set1_p1'] + $game['set2_p1'] + $game['set3_p1']; 
        }
    }
    
    $setWonCountUser2 = 0; 
    $setGameCountUser2 = 0; 
    if (!empty($gameListUser2)) {
        
        foreach ($gameListUser2 as $game) {
            
            // count set 
            if (in_array("{$game['set1_p1']}:{$game['set1_p2']}", $setWonByUser2)) { $setWonCountUser2++; }
            if (in_array("{$game['set2_p1']}:{$game['set2_p2']}", $setWonByUser2)) { $setWonCountUser2++; }
            if (in_array("{$game['set3_p1']}:{$game['set3_p2']}", $setWonByUser2)) { $setWonCountUser2++; }
            
            // count game 
            $setGameCountUser2 = $game['set1_p2'] + $game['set2_p2'] + $game['set3_p2']; 
        }
    }
    
    // add rank for sets 
    $rank += ($setWonCountUser1 + $setWonCountUser2) * FOR_EVERY_SETWON_RANK; 

    // add rank for games 
    $rank += ($setGameCountUser1 + $setGameCountUser2) * FOR_EVERY_GAMEWON_RANK; 
    
    return $rank > 0 ? $rank : 0; 
}

function calculateRankByMatch($userId, $matchId) {
    
    $ci =& get_instance();
    
    // result array 
    $setWonByUser1 = array(
        
        '6:0', '6:1', '6:2', '6:3', '6:4', '7:5', '7:6', 
    ); 
    
    $setWonByUser2 = array(
        
        '0:6', '1:6', '2:6', '3:6', '4:6', '5:7', '6:7', 
    ); 
    
    $rank = 0; 
    
    // for every vitory 
    $wonGames = $ci->match_model->getConfirmedWonGamesByUserIdMatchId($userId, $matchId); 
    $wonGames = $wonGames['total_count']; 
    $rank += $wonGames * FOR_EVERY_VITORY_RANK; 
    
    // for every loss 
    $lossGames = $ci->match_model->getConfirmedLossGamesByUserIdMatchId($userId, $matchId); 
    $lossGames = $lossGames['total_count']; 
    $rank += $lossGames * FOR_EVERY_LOSS_RANK; 
    
    // for every set won and for every game won 
    
    // count when user number is 1 in game and then when user number is 2 in game 
    $gameListUser1 = $ci->match_model->getConfirmedAllGamesByUserIdByMatch(1, $userId, $matchId); 
    $gameListUser2 = $ci->match_model->getConfirmedAllGamesByUserIdByMatch(2, $userId, $matchId); 
    
    $setWonCountUser1 = 0; 
    $setGameCountUser1 = 0; 
    if (!empty($gameListUser1)) {
        
        foreach ($gameListUser1 as $game) {
            
            // count set 
            if (in_array("{$game['set1_p1']}:{$game['set1_p2']}", $setWonByUser1)) { $setWonCountUser1++; }
            if (in_array("{$game['set2_p1']}:{$game['set2_p2']}", $setWonByUser1)) { $setWonCountUser1++; }
            if (in_array("{$game['set3_p1']}:{$game['set3_p2']}", $setWonByUser1)) { $setWonCountUser1++; }
            
            // count game 
            $setGameCountUser1 = $game['set1_p1'] + $game['set2_p1'] + $game['set3_p1']; 
        }
    }
    
    $setWonCountUser2 = 0; 
    $setGameCountUser2 = 0; 
    if (!empty($gameListUser2)) {
        
        foreach ($gameListUser2 as $game) {
            
            // count set 
            if (in_array("{$game['set1_p1']}:{$game['set1_p2']}", $setWonByUser2)) { $setWonCountUser2++; }
            if (in_array("{$game['set2_p1']}:{$game['set2_p2']}", $setWonByUser2)) { $setWonCountUser2++; }
            if (in_array("{$game['set3_p1']}:{$game['set3_p2']}", $setWonByUser2)) { $setWonCountUser2++; }
            
            // count game 
            $setGameCountUser2 = $game['set1_p2'] + $game['set2_p2'] + $game['set3_p2']; 
        }
    }
    
    // add rank for sets 
    $rank += ($setWonCountUser1 + $setWonCountUser2) * FOR_EVERY_SETWON_RANK; 

    // add rank for games 
    $rank += ($setGameCountUser1 + $setGameCountUser2) * FOR_EVERY_GAMEWON_RANK; 
    
    return $rank > 0 ? $rank : 0; 
}

function rankData($key = 0) {
    
    $rankOption = array(

        1 => '1 - 100', 
        2 => '100 - 500', 
        3 => '500 - 1000', 
        4 => '1000 - 2000', 
    ); 

    if (in_array($key, array_keys($rankOption))) {
        
        return $rankOption[$key]; 
    }
    else {
        
        return $rankOption; 
    }
}