<?php
    class DB{
        protected $link=null;
        public $status=1;
        
        public function __construct(){
            $dir = dirname(__FILE__);
            $ini_array= parse_ini_file("$dir/dbconf.inc.php");
            $host = $ini_array["host"];
            $user = $ini_array["user"];
            $password = $ini_array["password"];
            $this->link = mysql_connect($host,$user,$password);
            $res=  mysql_select_db("leave_app", $this->link);
            
            if(!$this->link || !$res){
                $this->status = NULL;
                die("Mysql Connection Error ".mysql_error());
            }
        }
        
       
    }
?>
