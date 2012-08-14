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

require_once 'ORM/user.ORM.php';
class user {
    public $userid=0;
    public $name=null;
    public $firstname=null;
    public $lastname=null;
    protected $DB=null;
    
    
    public function __construct($userid,$DB) {
        $this->userid=$userid;
        $this->DB= $DB;
        $this->name= $this->DB->fullname($this->userid);
        $this->firstname=$this->DB->firstname($this->userid);
        $this->lastname=$this->DB->lastname($this->userid);
    }
    
}

?>
