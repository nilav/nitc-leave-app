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
        
        public function  getUserType($id){
            if($this->link){
                $query="SELECT user_type FROM user WHERE user_id=$id";
                $result= mysql_query($query, $this->link);
                if(mysql_affected_rows()>0){
                    $row= mysql_fetch_row($result);
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
        public function getPendingStudentActivationRequest($department_type,$user_type){
            if($this->link){
                $query= "SELECT a.first_name, a.last_name, a.email, a.contact_number,a.gender,a.activated,a.add_time, b.roll_no, b.category, a.user_id FROM user a,student_info b WHERE a.department_id=$department_type AND a.user_type=$user_type AND a.activated=0 AND a.user_id=b.student_id";
                $result=  mysql_query($query,  $this->link);
                if(mysql_affected_rows()>0){
                    return $result;
                }
                return 0;
            }
            return 0;
        }
        
        
        
         public function getPendingFaActivationRequest($department_type,$user_type){
            if($this->link){
                $query= "SELECT a.first_name, a.last_name, a.email, a.contact_number,a.gender,a.activated,a.add_time,a.user_id FROM user a WHERE a.department_id=$department_type AND a.user_type=$user_type AND a.activated=0";
                $result=  mysql_query($query,  $this->link);
                if(mysql_affected_rows()>0){
                    return $result;
                }
                return 0;
            }
            return 0;
        }
         public function getPendingHodActivationRequest($user_type){
            if($this->link){
                $query= "SELECT a.first_name, a.last_name, a.email, a.contact_number,a.gender,a.activated,a.add_time, a.department_id, a.user_id FROM user a WHERE  a.user_type=$user_type AND a.activated=0";
                $result=  mysql_query($query,  $this->link);
                if(mysql_affected_rows()>0){
                    return $result;
                }
                return 0;
            }
            return 0;
        }
        
        public function approveRequest($uid){
            if($this->link){
                $query="UPDATE user SET activated=1 WHERE user_id=$uid";
                mysql_query($query,$this->link);
                if(mysql_affected_rows()>0){
                    return 1;
                }
                return 0;
            }
            return 0;
        }
        
        public function deleteStudentInfo($uid){
            if($this->link){
                $query="DELETE FROM student_info where student_id=$uid";
                mysql_query($query,$this->link);
                if(mysql_affected_rows()>0){
                    return 1;
                }
                return 0;
            }
            return 0;
        }
        
        public function deleteUser($uid){
            if($this->link){
                $query="DELETE FROM user where user_id=$uid";
                mysql_query($query,$this->link);
                if(mysql_affected_rows()>0){
                    return 1;
                }
                return 0;
            }
            return 0;
        }
        
        public function getStudentInfo(){
            if($this->link){
                $query="SELECT student_id,roll_no, category FROM student_info";
                $result= mysql_query($query, $this->link);
                if(mysql_affected_rows()>0){
                    return $result;
                }
                return false;
            }
            return false;
        }
}

?>
