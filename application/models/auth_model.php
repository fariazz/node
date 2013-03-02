<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auth_model
 * 
 * @desc        Auth_model
 */
class Auth_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }

    public function login($login, $pass) {
        
        $passMd5 = md5($pass); 
        $sql = "

            select * from user 
            where email = '$login' 
            and password = '$passMd5' 
        "; 
        //echo $sql; //exit(); 
        $res = $this->db->query($sql)->row_array(); 
        //printit($res); exit(); 

        return $res; 
    }
    
    public function restorePassword($login) {
        
        $passMd5 = md5($pass); 
        $sql = "

            select * from user 
            where email = '$login' 
            and pass = '$passMd5' 
        "; 
        $res = $this->db->query($sql)->row_array(); 

        return $res; 
    }
}