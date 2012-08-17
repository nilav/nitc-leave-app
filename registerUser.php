<?php

    require_once 'DB/initDB.php';
    require_once 'DB/registerDB.php';
    
    $rDB= new registerDB();
    
    $redirect = 'register.php';
    
    $fname = htmlspecialchars(trim($_POST['first_name']));
    $lname = htmlspecialchars(trim($_POST['last_name']));
    $email = $_POST['email'];
    $sex= $_POST['sex'];
    $contact= $_POST['contact'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $user_type=$_POST['user_type'];
    $category = $_POST['category'];
//    $user_name= $_POST['user_name'];
    
    $activated=0;
    
    if(isset($_POST['department'])){
        $department = $_POST['department'];
    }else{
        $department=0; //User is office staff
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
    
    if(strlen($pass1) < 6) {
        header("Location:/".$redirect."?error=3");
        die();
    }
    
    if($pass1 != $pass2 ) {
        header("Location:/".$redirect."?error=4");
        die();
    }
    
    if($user_type == 0){
        header("Location:/".$redirect."?error=5");
        die();
    }
    
//    if(!preg_match('^[0-9]{10}', $contact)){
//        header("Location:/". $redirect."?error=6");
//        die();
//    }
    
//    if($rDB->checkUserName($user_name)){
//        header("Location:/".$redirect."?error=7");
//        die();
//    }
    
    //For HOD user_type=2
    //Faculty Advisor user_type=3
    //Office Staff user_type=4
    //Student user_type=5
    //For Office Staff Department id is equal to 0 that means they don't belong to any department
    
    if($user_type == 2){
        $rDB->insertUser($fname,$lname,$user_type,$email,$department,$pass1,$contact,$sex,$activated);
    }elseif($user_type == 3){
        $rDB->insertUser($fname,$lname,$user_type,$email,$department,$pass1,$contact,$sex,$activated);
    }elseif($user_type == 4){
        $rDB->insertUser($fname,$lname,$user_type,$email,0,$pass1,$contact,$sex,$activated);
    }elseif($user_type == 5){
        $student_id = $rDB->insertUser($fname,$lname,$user_type,$email,$department,$pass1,$contact,$sex,$activated);
        if(isset($student_id)){
            $rDB->insertStudentInfo($student_id, $roll_number, $category);
        }
    }
    
    header("Location:done.php?act=1");
?>
