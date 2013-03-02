<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matchtotal_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }
    
    public function updateMatchtotal($userId, array $data) {
        
        foreach ($data as $key => $value) {

            $lineArray[] = " $key = '$value' "; 
        }
        $line = implode(",", $lineArray); 

        $sql = "

            update match_total 
            set $line 
            where user_id = $userId 
        "; 
        //echo $sql; exit(); 
        $this->db->query($sql); 
    }
}