<?php

/* TODO: Make sure that Only one HOD and FA could be in each deartment in database.
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author nilavnirav
 */

//require_once 'ORM/user.ORM.php';
class user {
    public $userid=0;
    public $name=null;
    public $firstname=null;
    public $lastname=null;
    protected $DB=null;
    
    
    public function __construct($userid,$DB) {
        $this->userid=$userid;
        $this->DB= $DB;
        $this->name= $this->DB->getFullName($this->userid);
        $this->firstname=$this->DB->getFirstName($this->userid);
        $this->lastname=$this->DB->getLastName($this->userid);
        $this->email=$this->DB->getEmail($this->userid);
    }
    
    public function getUserName(){
        return $this->DB->getUserName($this->userid);
    }
    
    public function getFirstName(){
        return $this->firstname;
    }
    
    public function getLastName(){
        return $this->lastname;
    }
    
    public function getFullName(){
        return $this->name;
    }
    
    public function getEmail(){
        return $this->email;
    
    }    
}

class studentUser extends user{
    public $department=0;
    public $roll_no=0;
    public $category=0;
    
    public function __construct($userid, $DB) {
        parent::__construct($userid, $DB);
        $this->roll_no = $this->DB->getRollNumber($userid);
        $this->department = $this->DB->getDepartmentId($userid);
        
        $this->category= $this->DB->getCategory($userid);
    }
    
    public function getDepartment(){
        return $this->department;
    }
    
    public function getRollNumber(){
        return $this->roll_no;
    }
    
    public function getCategory(){
        return $this->category;
    }   
}

class HODUser extends user{
    public $department=0;
    
    public function __construct($userid, $DB) {
        parent::__construct($userid, $DB);
        $this->department = $this->DB->getDepartmentId($userid);
    }
    
    public function getDepartment(){
        return $this->department;
    }
}

class FAUser extends user{
    public $department=0;
    
    public function __construct($userid, $DB) {
        parent::__construct($userid, $DB);
        $this->department = $this->DB->getDepartmentId($userid);
    }
    
    public function getDepartment(){
        return $this->department;
    }
}

class OSuser extends user{
    
}

?>
