<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User_model
 * 
 * @desc        user model 
 */
class User_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }

    // new 
    public function addUser(array $data) {
        
        $nameString = implode("`, `", array_keys($data)); 
        $nameString = "`$nameString`"; 
        
        $lineString = implode("', '", $data); 
        $lineString = "'$lineString'"; 
        
        $sql = "

            insert into user ($nameString) 
            values ($lineString)
        "; 
        //echo $sql; 

        $res = $this->db->query($sql); 
        $userId = $this->db->insert_id(); 

        return  $userId; 
    }
    
    // new 
    public function getUserById($id) {
        
        $sql = "

            select * from user as t1 
            where t1.id = $id 
        "; 
        //echo $sql; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    // new 
    public function deleteUserById($id) {
        
        $sql = "

            delete from user 
            where id = $id 
        "; 
        //echo $sql; 
        $this->db->query($sql); 
    }
    
    public function getUserByFacebookId($id) {
        
        $sql = "

            select *, t1.id as user_id from user as t1 
            join match_total as t2 on t2.user_id = t1.id 
            where t1.facebook_id = '$id' 
        "; 
        //echo $sql; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    // new 
    public function getUserList(array $filter) {
        
        if (!empty($filter)) {
            
            foreach ($filter as $key => $value) {
                
                if (!empty($value)) { 
                 
                    $whereArray[] = "$key = '$value'"; 
                }
            }
        }
        
        $sql = "

            select * from user 
        "; 
        
        if (!empty($whereArray)) {
            
            $whereLine = implode(" and ", $whereArray); 
            $sql .= " where $whereLine "; 
        }
        
        //$sql .= " order by t2.total_ranking_point desc "; 
        
        //echo $sql; 
        $res = $this->db->query($sql)->result_array(); 
        
        $resF = array(); 
        if (!empty($res)) { foreach ($res as $item) { 
            
            $resF[$item['id']] = $item; 
        } } 
        
        return $resF; 
    }
    
    public function getUserByEmail($email) {
        
        $sql = "

            select *, t1.id as user_id from user as t1 
            join match_total as t2 on t2.user_id = t1.id 
            where t1.email = '$email' 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function getUserByName($name) {
        
        $sql = "

            select * from user 
            where name = '$name' 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function updateUser($id, array $data) {
        
        foreach ($data as $key => $value) {

            $lineArray[] = " $key = '$value' "; 
        }
        $line = implode(",", $lineArray); 

        $sql = "

            update user 
            set $line 
            where id = $id 
        "; 
        $this->db->query($sql); 
    }
    
    public function setHash($email, $hash) {
        
        $sql = "
        
            update user set newpass_hash = '$hash' 
            where email = '$email' 
        "; 
        $this->db->query($sql); 
    }
    
    public function changePassByHash($emailHash, array $data) {
        
        $passMd5 = md5($data['password']); 
        $sql = "
        
            update user set pass = '$passMd5' 
            where md5(email) = '$emailHash' 
            and newpass_hash = '{$data['newpass_hash']}' 
        "; 
        $res = $this->db->query($sql); 
        
        return $res; 
    }
    
    public function changePass($userId, array $data) {
        
        $passMd5 = md5($data['password']); 
        $sql = "
        
            update user set password = '$passMd5' 
            where id = $userId 
        "; 
        $res = $this->db->query($sql); 
        
        return $res; 
    }
}