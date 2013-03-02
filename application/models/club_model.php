<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Club_model
 * 
 * @desc        club model 
 */
class Club_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }

    public function clubDelete($userId, $clubId) {

        // check if you are a owner 
        if ($this->_isClubOwner($userId, $clubId) == FALSE) {
            
            echo "error: access denied, you are not a club owner"; exit(); 
        } 
        
        $res = array(); 
        
        // check if club is in use 
        $sql = "
            
            select * from club_has_user 
            where club_id = $clubId 
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        if (!empty($res)) {
            
            return $res; 
        }
        
        // remove club from db 
        $sql = "

            delete from club 
            where id = $clubId
        "; 
        $this->db->query($sql); 
        
        return $res; 
    }
    
    public function getClubList() {
        
        $sql = "

            select * from club 
            order by id desc  
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function getClubListMy($ownerId = 0) {
        
        $sql = "

            select * from club 
            where club_owner_id = $ownerId 
            order by id desc  
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function getClubById($id) {
        
        $sql = "

            select * from club 
            where id = $id 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function getUserClubList($userId) {
        
        $sql = "

            select * from club_has_user as t1 
            join club as t2 on t2.id = t1.club_id 
            where t1.user_id = $userId 
            order by t2.id 
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function getClubPlayerList($id) {
        
        $sql = "

            select * from club_has_user as t1 
            join users as t2 on t2.id = t1.user_id 
            where t1.club_id = $id 
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    private function _isClubOwner($userId, $clubId) {
        
        $sql = "
            
            select * from club 
            where id = $clubId 
            and club_owner_id = $userId 
        "; 
        
        $res = $this->db->query($sql)->row_array(); 
        
        return empty($res) ? FALSE : TRUE; 
    }
    
    public function clubEdit($userId, array $data) {
        
        // check if you are a owner 
        if ($this->_isClubOwner($userId, $data['id']) == FALSE) {
            
            echo "error: access denied, you are not a club owner"; exit(); 
        } 
        
        $id = $data['id']; 
        unset($data['id']); 
        
        foreach ($data as $key => $value) {

            $lineArray[] = " $key = '$value' "; 
        }
        $line = implode(",", $lineArray); 

        $sql = "

            update club  
            set $line 
            where id = $id 
        "; 
        //echo $sql; exit(); 
        $this->db->query($sql); 
    }
    
    public function saveUserClubs($userId, array $clubIdList) {
        
        // clean all user club 
        $sql = "
        
            delete from club_has_user 
            where user_id = $userId 
        "; 
        $this->db->query($sql); 
        
        // add new user club 
        foreach ($clubIdList as $item) {
            
            $sql = "

                insert into club_has_user (`club_id`, `user_id`) 
                values ($item, $userId) 
            "; 
            $this->db->query($sql); 
        }
    }
    
    public function clubAdd(array $post) {
        
        $sql = "

            insert into club (`name`, `street`, `postal_code`, `city`, `website`, `country_id`, `club_owner_id`) 
            values ('{$post['name']}', '{$post['street']}', '{$post['postal_code']}', '{$post['city']}', '{$post['website']}', '{$post['country_id']}', '{$post['club_owner_id']}') 
        "; 
        $this->db->query($sql); 
        $id = $this->db->insert_id(); 
        
        return $id; 
    }
}