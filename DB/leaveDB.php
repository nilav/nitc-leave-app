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
    
        public function getPendingApplication($department_type, $app_status){
                If($this->link){
                    $query="SELECT c.app_id, c.user_id, a.first_name, a.last_name, b.roll_no, c.leave_type, c.leave_reason, c.starting_date, c.end_date, c.submission_time FROM user a, student_info b, application c WHERE a.department_id=$department_type AND a.user_type=5 AND a.user_id=b.student_id AND a.user_id=c.user_id AND c.app_status=$app_status";
                    $result= mysql_query($query,  $this->link);
                    if(mysql_affected_rows()>0){
                        return $result;
                    }
                    return 0;
                }
                return 0;
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
            $query="UPDATE application SET starting_date='$s_date', end_date='$e_date', leave_type='$leave_type', leave_reason='$leave_reason', app_status=0 WHERE app_id=$apid";//setting app_status 0 because after mdification it need to go to whole process again
            mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                return 1;
            }    
            return 0;
        }
        return 0;
    }
    
    public function deleteLeave($apid){
        if($this->link){
            $query="DELETE FROM application where app_id=$apid";
            mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                return 1;
            }
            return 0;
        }
        return 0;
    }
    
    public function modifyLeave($apid, $approve){
        if($this->link){
            $query="UPDATE application SET app_status=$approve WHERE app_id=$apid";
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
