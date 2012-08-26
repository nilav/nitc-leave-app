<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of leaveDB
 *
 * @author Nilav Nirav
 */
class leaveDB extends DB{
    public function getLeaveType(){
        if($this->link){
            $query="SELECT * FROM leave_type";
            $result=  mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
//                $result=  mysql_fetch_row($result);
                return $result;
            }
            return 0;
        }
        return 0;
    }
    
    public function applyLeave($userId, $leave_type, $s_date, $e_date, $reason){
        if($this->link){
            $query="INSERT INTO application (user_id, leave_type, starting_date, end_date, leave_reason, app_status) VALUES ($userId, '$leave_type', '$s_date', '$e_date', '$reason', 0)"; //app_status 0 refer that account s currently deactivated.
            mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                return true;
            }
            return false;
        }
        return false;
    }
    
    public function getLeaveHistory($id){
        if($this->link){
            $query = "SELECT * FROM application WHERE user_id = $id";
            $result = mysql_query($query,$this->link);
            if(mysql_affected_rows()>0){
                return $result;
            }
            return false;
        }
        return false;
    }
}

?>
