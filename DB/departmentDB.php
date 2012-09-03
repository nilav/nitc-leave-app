<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departmentDB
 *
 * @author nilavnirav
 */
class departmentDB extends DB{
    
   public function getDepartmentName($dept_id){
            if($this->link){
                $query="SELECT dept_name FROM department WHERE department_id=$dept_id";
                $result = mysql_query($query, $this->link);
                if(mysql_affected_rows()>0){
                    $row = mysql_fetch_row($result);
                    return $row[0];
                }
                return 0;
            }
            return 0;
        }
    public function getDepartmentList(){
        if($this->link){
            $query="SELECT department_id,dept_name,dept_desc FROM department";
            $result = mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                return $result;
            }
            return 0;
        }
        return 0;
    }
    
    public function addDepartment($dept_name, $dept_desc){
        if($this->link){
            $query="INSERT INTO department (dept_name, dept_desc) VALUES ('$dept_name','$dept_desc') ";
            mysql_query($query,$this->link);
            if(mysql_affected_rows()>0){
                return true;
            }
            return false;
        }
        return false;
    }
    public function getsemStartDate($dept_id){
        if($this->link){
            $query="SELECT s_date FROM department where department_id=$dept_id";
            $result = mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                $row = mysql_fetch_row($result);
                return $row[0];
            }
            return 0;
        }
        return 0;
    }
    public function getsemEndDate($dept_id){
        if($this->link){
            $query="SELECT e_date FROM department where department_id=$dept_id";
            $result = mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                $row = mysql_fetch_row($result);
                return $row[0];
            }
            return 0;
        }
        return 0;
    }
    
    public function setsemStartDate($dept_id, $s_date){
        if($this->link){
            $query="UPDATE  department SET  s_date =  '$s_date' WHERE  department_id =$dept_id";
            $result = mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
               
                return true;
            }
            return 0;
        }
        return 0;
    }
    public function setsemEndDate($dept_id,$e_date){
        if($this->link){
            $query="UPDATE  department SET  e_date =  '$e_date' WHERE  department_id =$dept_id";
            $result = mysql_query($query, $this->link);
            if(mysql_affected_rows()>0){
                
                return true;
            }
            return 0;
        }
        return 0;
    }
}

?>
