<?php
    session_start();    
    
    if(isset($_SESSION["leave_app_id"])){
        $USERID=$_SESSION["leave_app_id"];
        $USERTYPE=$_SESSION["usertype"];
        
    }else{
        header("Location: login.php");
        die();
    }

?>
