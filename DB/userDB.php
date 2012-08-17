<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userDB
 *
 * @author nilavnirav
 */
class userDB extends DB{    
    
        public function getUserName($id){
            if($this->link){
                $query="SELECT user_name FROM user WHERE user_id=$id";
                $result = mysql_query($query,$this->link);
                if(mysql_affected_rows()>0){
                    $row=  mysql_fetch_row($result);
                    $name=$row[0];
                    return $name;
                }
                return 0;
            }
            return 0;
        }
        
        public function getFullName($id){
            if($this->link){
                $query="SELECT first_name, last_name FROM user WHERE user_id=$id";
                $result = mysql_query($query,$this->link);
                if(mysql_affected_rows()>0){
                    $row=  mysql_fetch_row($result);
                    $name="$row[0] "."$row[1]";
                    return $name;
                }
                return 0;
            }
            return 0;
        }
        
        public function getFirstName($id){
            if ($this->link){
                $query="SELECT first_name FROM user WHERE user_id=$id";
                $result= mysql_query($query, $this->link);
                if(mysql_affected_rows()>0){
                    $row= mysql_fetch_row($result);
                    $firstname= $row[0];
                    return $firstname;
                }
                return 0;
            }
            return 0;
        }
        
        public function getLastName($id){
            if ($this->link){
                $query="SELECT last_name FROM user WHERE user_id=$id";
                $result= mysql_query($query, $this->link);
                if(mysql_affected_rows()>0){
                    $row= mysql_fetch_row($result);
                    $lastname= $row[0];
                    return $lastname;
                }
                return 0;
            }
            return 0;
        }
        
        public function getEmail($id){
            if ($this->link){
                $query="SELECT email FROM user WHERE user_id=$id";
                $result= mysql_query($query, $this->link);
                if(mysql_affected_rows()>0){
                    $row= mysql_fetch_row($result);
                    $email= $row[0];
                    return $email;
                }
                return 0;
            }
            return 0;
        }
//        public function getDepartmentId($id){
//            if ($this->link){
//                $query="SELECT department_id FROM user WHERE user_id=$id";
//                $result= mysql_query($query, $this->link);
//                if(mysql_affected_rows()>0){
//                    $row= mysql_fetch_row($result);
//                    $lastname= $row[0];
//                    return $lastname;
//                }
//                return 0;
//            }
//            return 0;
//        }
        public function getDepartmentId($id){
            if($this->link){
                $query="SELECT department_id FROM user WHERE user_id=$id";
                $result = mysql_query($query,  $this->link);
                if(mysql_affected_rows()>0){
                    $row = mysql_fetch_row($result);
                    return $row[0];
                }
                return 0;
            }
            return 0;
        }
        
        public function getRollNumber($id){
            if($this->link){
                $query="SELECT roll_no FROM student_info WHERE student_id = $id";
                $result = mysql_query($query,  $this->link);
                if(mysql_affected_rows()>0){
                    $row = mysql_fetch_row($result);
                    return $row[0];
                }
                return 0;
            }
            return 0;
        }
        
         public function getCategory($id){
            if($this->link){
                $query="SELECT category FROM student_info WHERE student_id = $id";
                $result = mysql_query($query,  $this->link);
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
