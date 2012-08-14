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
    
        public function getUserFullName($id){
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
    
}

?>
