<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Training_model
 * 
 * @desc        training model 
 */
class Training_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }

    public function addTraining(array $data) {
        
        $nameString = implode("`, `", array_keys($data)); 
        $nameString = "`$nameString`"; 
        
        $lineString = implode("', '", $data); 
        $lineString = "'$lineString'"; 
        
        $sql = "

            insert into training ($nameString) 
            values ($lineString)
        "; 

        $res = $this->db->query($sql); 
        
        return  $this->db->insert_id(); 
    }
    
    public function updateTraining($id, array $data) {
        
        foreach ($data as $key => $value) {

            $lineArray[] = " $key = '$value' "; 
        }
        $line = implode(",", $lineArray); 

        $sql = "

            update training 
            set $line 
            where id = $id 
        "; 
        //echo $sql; exit(); 
        $this->db->query($sql); 
    }
    
    public function getTrainingById($id) {
        
        $sql = "

            select *, time_format(time, '%H:%i') as time_f, time_to_sec(timediff(concat(date, ' ', time), now())) as second_left from training 
            where id = $id 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function getUserScheduledTrainingList($userId) {
        
        $sql = "

            select *, t1.id as training_id, t2.name as user1_name, t3.name as user2_name, time_format(time, '%H:%i') as time_f from training as t1 
            join user as t2 on t2.id = t1.user_id1 
            join user as t3 on t3.id = t1.user_id2 
            where (user_id1 = $userId or user_id2 = $userId) 
            order by t1.date, t1.time asc  
        "; 
        
        //echo $sql; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function getTrainingByEmail($email) {
        
        $sql = "

            select * from trainings 
            where email = '$email' 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function setHash($email, $hash) {
        
        $sql = "
        
            update trainings set newpass_hash = '$hash' 
            where email = '$email' 
        "; 
        $this->db->query($sql); 
    }
    
    public function changePassByHash($emailHash, array $data) {
        
        $passMd5 = md5($data['password']); 
        $sql = "
        
            update trainings set pass = '$passMd5' 
            where md5(email) = '$emailHash' 
            and newpass_hash = '{$data['newpass_hash']}' 
        "; 
        $res = $this->db->query($sql); 
        
        return $res; 
    }
    
    public function changePass($trainingId, array $data) {
        
        $passMd5 = md5($data['password']); 
        $sql = "
        
            update trainings set pass = '$passMd5' 
            where id = $trainingId 
        "; 
        $res = $this->db->query($sql); 
        
        return $res; 
    }
}