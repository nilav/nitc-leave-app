<?php
    class registerDB extends DB{
        
        
        public function checkLogin($name, $password){
            if($this->link){
                $query = "select user_id from user where user_name='$name' and password='$password' and activated=1";
                $result= mysql_query($query, $this->link);
                if(mysql_affected_rows()>0){
                    $row = mysql_fetch_row($result);
                    return $row[0];
                }
                return 0;
            }
            return 0;
        }
        
        public function getUserType($id){
            if($this->link){
                $query = "select user_type from user where user_id='$id'";
                $result= mysql_query($query,  $this->link);
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
                $query = "SELECT department_id,dept_name FROM department";
                $result= mysql_query($query,  $this->link);
                if(mysql_affected_rows()>0){
                    return $result;
                }
                return 0;
            }
            return 0;
        }
        
    }
?>
