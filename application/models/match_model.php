<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Match_model extends CI_Model
{
    public function __construct() {
        
        parent::__construct();
    }

    // return count won match by user id 
    public function getWonMatchByUserId($id) {
        
        $sql = "

            select count(*) as total_count from `match` 
            where status = 'confirmed' 
            and winner_id = $id 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function getConfirmedWonGamesByUserIdMatchId($userId, $matchId) {
        
        $sql = "

            select count(*) as total_count from `match` 
            where status = 'confirmed' 
            and winner_id = $userId 
            and id = $matchId 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    // return count lost match by user id 
    public function getLostMatchByUserId($id) {
        
        $sql = "

            select count(*) as total_count from `match` 
            where status = 'confirmed' 
            and (user_id1 = $id || user_id2 = $id) 
            and winner_id <> $id 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function getConfirmedLossGamesByUserIdMatchId($userId, $matchId) {
        
        $sql = "

            select count(*) as total_count from `match` 
            where status = 'confirmed' 
            and (user_id1 = $userId || user_id2 = $userId) 
            and winner_id <> $userId 
            and id = $matchId 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function getConfirmedAllGamesByUserId($number, $userId) {
        
        $sql = "

            select * from `match` 
            where status = 'confirmed' 
            and user_id$number = $userId 
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function getConfirmedAllGamesByUserIdByMatch($number, $userId, $matchId) {
        
        $sql = "

            select * from `match` 
            where status = 'confirmed' 
            and user_id$number = $userId 
            and id = $matchId 
        "; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function getGameCountForUser($userId) {
        
        $sql = "

            select count(*) from `match` 
            where user_id1 = $userId 
            or user_id2 = $userId 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return array_pop($res); 
    }
    
    public function countWonMatchByUserId($userId) {
        
        $sql = "

            select count(*) from `match` 
            where winner_id = $userId 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return array_pop($res); 
    }
    
    public function getWonMatchCountForUser($userId) {
        
        $sql = "

            select sum(set1_p1) as s1, sum(set2_p1) as s2, sum(set3_p1) as s3 from `match` 
            where user_id1 = $userId 
            
        "; 
        $res1 = $this->db->query($sql)->row_array(); 

        $sql = "

            select sum(set1_p2) as s1, sum(set2_p2) as s2, sum(set3_p2) as s3 from `match` 
            where user_id2 = $userId 
            
        "; 
        $res2 = $this->db->query($sql)->row_array(); 
        
        return array_sum($res1) + array_sum($res2); 
    }
    
    public function updateUserRanking($id, $rank) {
        
        $sql = "

            update match_total 
            set total_ranking_point = $rank 
            where user_id = $id 
        "; 
        //echo $sql; exit(); 
        $this->db->query($sql); 
    }
    
    public function addGame(array $data) {
        
        $nameString = implode("`, `", array_keys($data)); 
        $nameString = "`$nameString`"; 
        
        $lineString = implode("', '", $data); 
        $lineString = "'$lineString'"; 
        
        $sql = "

            insert into `match` ($nameString) 
            values ($lineString)
        "; 

        $res = $this->db->query($sql); 
        
        return  $this->db->insert_id(); 
    }
    
    public function addResult($userId, array $data) {
        
        $parts = explode(":", $data['set1']); 
        $set1_p1 = $parts[0]; 
        $set1_p2 = $parts[1]; 

        $parts = explode(":", $data['set2']); 
        $set2_p1 = $parts[0]; 
        $set2_p2 = $parts[1]; 

        $parts = explode(":", $data['set3']); 
        $set3_p1 = $parts[0]; 
        $set3_p2 = $parts[1]; 

        $sql = "

            update `match` set 
            confirmed_result_user_id = $userId, 
            winner_id = {$data['winner_id']}, 
            set1_p1 = $set1_p1, 
            set1_p2 = $set1_p2, 
            set2_p1 = $set2_p1, 
            set2_p2 = $set2_p2, 
            set3_p1 = $set3_p1, 
            set3_p2 = $set3_p2 
            where id = {$data['game_id']} 
        "; 

        $res = $this->db->query($sql); 
        
        return  $res; 
    }
    
    public function updateGame($id, array $data) {
        
        foreach ($data as $key => $value) {

            $lineArray[] = " $key = '$value' "; 
        }
        $line = implode(",", $lineArray); 

        $sql = "

            update `match` 
            set $line 
            where id = $id 
        "; 
        //echo $sql; exit(); 
        $this->db->query($sql); 
    }
    
    public function confirmResult($id) {
        
        $sql = "

            update `match` 
            set status = 'confirmed'  
            where id = $id 
        "; 
        //echo $sql; exit(); 
        $this->db->query($sql); 
    }
    
    public function getGameById($id) {
        
        $sql = "

            select *, time_format(t1.time, '%H:%i') as time_f, time_to_sec(timediff(concat(t1.date, ' ', t1.time), now())) as second_left, 
            t1.id as game_id, t2.name as user1_name, t3.name as user2_name from `match` as t1 
            join user as t2 on t2.id = t1.user_id1 
            join user as t3 on t3.id = t1.user_id2
            where t1.id = $id 
        "; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function getUserScheduledGameList($userId) {
        
        $sql = "

            select *, t1.id as game_id, t2.name as user1_name, t3.name as user2_name, time_format(time, '%H:%i') as time_f from `match` as t1 
            join user as t2 on t2.id = t1.user_id1 
            join user as t3 on t3.id = t1.user_id2 
            where (user_id1 = $userId or user_id2 = $userId) 
            order by t1.date, t1.time asc  
        "; 
        
        //echo $sql; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function getCompletedGameList() {
        
        $sql = "

            select *, t4.name as winner_name, t1.id as game_id, t2.name as user1_name, t3.name as user2_name, time_format(time, '%H:%i') as time_f from `match` as t1 
            join user as t2 on t2.id = t1.user_id1 
            join user as t3 on t3.id = t1.user_id2 
            left join user as t4 on t4.id = t1.winner_id 
            where t1.status in ('open', 'confirmed')  
            and concat(t1.date, ' ', t1.time) < now() 
            order by t1.date, t1.time asc  
        "; 
        
        //echo $sql; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function getCompletedPlayerGameList($userId) {
        
        $sql = "

            select *, t4.name as winner_name, t1.id as game_id, t2.name as user1_name, 
            t3.name as user2_name, time_format(time, '%H:%i') as time_f, 
            if (user_id1 = $userId, point_user1, point_user2) as current_user_point 
            from `match` as t1 
            join user as t2 on t2.id = t1.user_id1 
            join user as t3 on t3.id = t1.user_id2 
            left join user as t4 on t4.id = t1.winner_id 
            where t1.status in ('open', 'confirmed')  
            and concat(t1.date, ' ', t1.time) < now() 
            and $userId in (t1.user_id1, t1.user_id2)
            order by t1.date, t1.time asc  
        "; 
        
        //echo $sql; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
    
    public function countUserMatch($userId) {
        
        $sql = "

            select count(*) as count from `match` as t1 
            join user as t2 on t2.id = t1.user_id1 
            join user as t3 on t3.id = t1.user_id2 
            left join user as t4 on t4.id = t1.winner_id 
            where t1.status in ('confirmed')  
            and concat(t1.date, ' ', t1.time) < now() 
            and $userId in (t1.user_id1, t1.user_id2)
            order by t1.date, t1.time asc  
        "; 
        
        //echo $sql; 
        $res = $this->db->query($sql)->row_array(); 
        
        return $res; 
    }
    
    public function countPlayerSetWonLost($userId, $countWon = TRUE) {
        
        $userWonCount = 0; 
        
        $sign1 = $countWon ? '>' : '<'; 
        $sign2 = $countWon ? '<' : '>'; 
        
        $sql = "

            select count(*) as count from `match` as t1 
            where t1.user_id1 = $userId 
            and t1.set1_p1 $sign1 t1.set1_p2
        "; 
        $res = $this->db->query($sql)->row_array(); 
        $userWonCount += $res['count']; 

        $sql = "

            select count(*) as count from `match` as t1 
            where t1.user_id1 = $userId 
            and t1.set2_p1 $sign1 t1.set2_p2
        "; 
        $res = $this->db->query($sql)->row_array(); 
        $userWonCount += $res['count']; 

        $sql = "

            select count(*) as count from `match` as t1 
            where t1.user_id1 = $userId 
            and t1.set3_p1 $sign1 t1.set3_p2
        "; 
        $res = $this->db->query($sql)->row_array(); 
        $userWonCount += $res['count']; 

        $sql = "

            select count(*) as count from `match` as t1 
            where t1.user_id2 = $userId 
            and t1.set1_p1 $sign2 t1.set1_p2
        "; 
        $res = $this->db->query($sql)->row_array(); 
        $userWonCount += $res['count']; 

        $sql = "

            select count(*) as count from `match` as t1 
            where t1.user_id2 = $userId 
            and t1.set2_p1 $sign2 t1.set2_p2
        "; 
        $res = $this->db->query($sql)->row_array(); 
        $userWonCount += $res['count']; 

        $sql = "

            select count(*) as count from `match` as t1 
            where t1.user_id2 = $userId 
            and t1.set3_p1 $sign2 t1.set3_p2
        "; 
        $res = $this->db->query($sql)->row_array(); 
        $userWonCount += $res['count']; 

        return $userWonCount; 
    }
    
    public function countPlayerGameWonLost($userId, $countWon = TRUE) {
        
        $count = 0; 

        if ($countWon) {
            
            // I'm user1 
            $sql = "

                select sum(set1_p1) as s1, sum(set2_p1) as s2, sum(set3_p1) as s3 from `match` as t1 
                where t1.user_id1 = $userId 
            "; 
    
            $res = $this->db->query($sql)->row_array(); 
            $count += $res['s1'] + $res['s2'] + $res['s3']; 
            
            // I'm user2 
            $sql = "

                select sum(set1_p2) as s1, sum(set2_p2) as s2, sum(set3_p2) as s3 from `match` as t1 
                where t1.user_id2 = $userId 
            "; 
    
            $res = $this->db->query($sql)->row_array(); 
            $count += $res['s1'] + $res['s2'] + $res['s3']; 
        }
        else {
            
            // I'm user1 
            $sql = "

                select sum(set1_p1) as s1, sum(set2_p1) as s2, sum(set3_p1) as s3 from `match` as t1 
                where t1.user_id2 = $userId 
            "; 
    
            $res = $this->db->query($sql)->row_array(); 
            $count += $res['s1'] + $res['s2'] + $res['s3']; 
            
            // I'm user2 
            $sql = "

                select sum(set1_p2) as s1, sum(set2_p2) as s2, sum(set3_p2) as s3 from `match` as t1 
                where t1.user_id1 = $userId 
            "; 
    
            $res = $this->db->query($sql)->row_array(); 
            $count += $res['s1'] + $res['s2'] + $res['s3']; 
        }
        
        return $count; 
    }
    
    public function getCompletedNoResultYetPlayerGameList($userId) {
        
        $sql = "

            select *, t4.name as winner_name, t1.id as game_id, t2.name as user1_name, t3.name as user2_name, time_format(time, '%H:%i') as time_f from `match` as t1 
            join user as t2 on t2.id = t1.user_id1 
            join user as t3 on t3.id = t1.user_id2 
            left join user as t4 on t4.id = t1.winner_id 
            where t1.status in ('open', 'confirmed')  
            and concat(t1.date, ' ', t1.time) < now() 
            and $userId in (t1.user_id1, t1.user_id2)
            and t1.status = 'open' 
            order by t1.date, t1.time asc  
        "; 
        
        //echo $sql; 
        $res = $this->db->query($sql)->result_array(); 
        
        return $res; 
    }
}