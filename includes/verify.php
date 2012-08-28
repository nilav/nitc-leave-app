
<?php

//    TODO: Make email and password checkin as MD5...


    if(isset($_POST["email"])){
        $email= $_POST["email"];
        $userpassword= $_POST["userpassword"];
        if($email == "" || $userpassword == ""){
            $error=1;
        }else{
            include("DB/initDB.php");
            include("DB/registerDB.php");
            
            $rDB = new registerDB();
            $id= $rDB->checkLogin($email, $userpassword);
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
