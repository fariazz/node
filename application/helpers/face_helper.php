<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function random_face() {
    
    $facePic = array(
        
        'face_chin', 
        'face_cry', 
        'face_evil', 
        'face_nolo', 
        'face_nolo', 
        'face_ok', 
        'face_think', 
        'face_trollface', 
    ); 
    
    $randId = rand(1, count($facePic)) - 1; 
    $picUrl = base_url()."www/img/$facePic[$randId].png"; 
    
    return $picUrl; 
}