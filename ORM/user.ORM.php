<?php

    require_once 'DB/initDB.php';
    require_once 'DB/userDB.php';
    
    class userORM{
        private $DB=null;
        public function __construct(){
            $this->DB= new userDB();
        }
    }
?>
