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
}

?>
