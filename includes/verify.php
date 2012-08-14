<?php
    if(isset($_POST["username"])){
        $username= $_POST["username"];
        $userpassword= $_POST["userpassword"];
        if($username == "" || $userpassword == ""){
            $error=1;
        }else{
            include("DB/initDB.php");
            include("DB/registerDB.php");
            
            $rDB = new registerDB();
            $id= $rDB->checkLogin($username, $userpassword);
            if($id){
                $userType=$rDB->getUserType($id);
                session_start();
                $sid=  session_id();
                $_SESSION["usertype"] = $userType;
                $_SESSION["leave_app_id"]=$id;
                header("Location: profile.php");
                       
            }else{
                $error=2;
            }
            
        }
    }

?>
