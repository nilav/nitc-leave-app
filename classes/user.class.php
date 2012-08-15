<?php

/*
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

?>
