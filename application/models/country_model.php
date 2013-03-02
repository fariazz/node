<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Country_model
 * 
 * @desc        country model 
 */
class Country_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }

    public function getCountryList() {
        
        $sql = "

            select * from country_list 
            where active = '1' 
            order by sort, name 
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        foreach ($res as $item) {
            
            $resF[$item['id']] = $item; 
        }
        
        return $resF; 
    }
}