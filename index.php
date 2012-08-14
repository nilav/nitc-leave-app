<?php
    session_start();
    if(isset($_SESSION["leave_app_id"])){
        $USERTYPE=$_SESSION["usertype"];  
        if($USERTYPE==1){
            include 'profile.php';
        }else{
            header("Location: profile.php");
            die();
        }    
    }else{
        include 'home-page.html';
    }
	
?>