<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Email_model
 * 
 * @desc        Email_model
 */
class Email_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }

    public function getEmailDataById($id) {
        
        $sql = "
           
            select * from email_template 
            where id = $id 
        "; 
        $res = $this->db->query($sql)->result_array(); 
        $res = array_pop($res); 
        
        return $res; 
    }
}