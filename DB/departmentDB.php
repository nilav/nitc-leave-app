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
}

?>
