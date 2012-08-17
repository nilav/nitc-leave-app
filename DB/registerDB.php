<?php
    class registerDB extends DB{
        
        
        public function checkLogin($email, $password){
            if($this->link){
                $query = "select user_id from user where email='$email' and password='$password' and activated=1";
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
        
        public function checkExistingUser($email){
            if($this->link){
                $query = "SELECT user_id FROM user WHERE email='$email'";
                $result=  mysql_query($query,  $this->link);
                if(mysql_affected_rows()>0){
                    $row = mysql_fetch_row($result);
                    return $row[0];
                }
                return 0;
            }
            return 0;
        }
        
        public function insertUser($fname,$lname,$user_type,$email,$department,$pass1,$contact,$sex,$activated){
            if($this->link){
                $query = "INSERT INTO user (first_name, last_name, user_type, email, department_id, password, contact_number, gender, activated, add_time) VALUES ('$fname','$lname', $user_type, '$email', $department, '$pass1', $contact, '$sex', $activated, NOW())";
                mysql_query($query, $this->link);
                $query='SELECT last_insert_id() as lastId';
                $result=  mysql_query($query);
                while($row=@mysql_fetch_assoc($result)){
                    $lastId=$row['lastId'];
                    return $lastId;
                }
//                if(mysql_affacted_rows()>0){
//                    return mysql_insert_id();
//                }
                return 0;
            }
            return 0;
        }
        
        public function insertStudentInfo($student_id, $roll_number,$category){
            if($this->link){
                $query = "INSERT INTO student_info (student_id, roll_no, category) VALUES ($student_id, '$roll_number', '$category')";
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
