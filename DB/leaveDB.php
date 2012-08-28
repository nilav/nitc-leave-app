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
            $query="INSERT INTO application (user_id, leave_type, starting_date, end_date, leave_reason, app_status, submission_time) VALUES ($userId, '$leave_type', '$s_date', '$e_date', '$reason', 0, NOW())"; //app_status 0 refer that account s currently deactivated.
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
    
    public function getUserLeaveDetails($dept_id){
        if($this->link){
            $query= "SELECT * FROM application WHERE user_id IN (SELECT user_id FROM user where department_id=$dept_id)";
            $result = mysql_query($query,$this->link);
            if(mysql_affected_rows()>0){
                return $result;
            }
            return false;
        }
        return false;
    }
    
    public function getApplicationInfo($aid){
        if($this->link){
            $query= "SELECT user_id,leave_type, starting_date, end_date, leave_reason, app_status FROM application WHERE app_id=$aid";
            $result= mysql_query($query, $this->link);
            if(mysql_affected_rows()==1){
                return $result;
            }
            return false;
        }
        return false;
    }
    
    public function updateLeaveInfo($apid,$s_date,$e_date,$leave_type,$leave_reason){
        if($this->link){
            $query="UPDATE application SET starting_date='$s_date', end_date='$e_date', leave_type='$leave_type', leave_reason='$leave_reason' WHERE app_id=$apid";
            mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                return 1;
            }    
            return 0;
        }
        return 0;
    }
}

?>
