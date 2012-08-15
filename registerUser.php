<?php

    require_once 'DB/initDB.php';
    require_once 'DB/registerDB.php';
    
    $rDB= new registerDB();
    
    $redirect = 'register.php';
    
    $fname = htmlspecialchars(trim($_POST['first_name']));
    $lname = htmlspecialchars(trim($_POST['last_name']));
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $user_type=$_POST['user_type'];
    
    if(isset($_POST['department'])){
        $department = $_POST['department'];
    }
    
    if(isset($_POST['roll_number'])){
        $roll_number = $_POST['roll_number'];
    }
    
    if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',$email)){
        header("Location:/".$redirect."?error=1");
        die();
    }
    
    if($rDB->checkExistingUser($email)){
        header("Location:/".$redirect."?error=2");
        die();
    }
?>
