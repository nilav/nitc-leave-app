<?php
    session_start();
    
    if(isset($_SESSION["leave_app_id"])){
        header("Locarion: .");
        die();        
    }

?>
