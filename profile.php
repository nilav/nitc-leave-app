<?php
    include 'checkid.php';
    include 'DB/initDB.php';
    include 'DB/userDB.php';
    include 'classes/user.class.php';
    
    $uDB= new userDB();
    $user= new user($USERID, $uDB);
    
//    if(isset($_SESSION("leave_app_id"))){
//        $id=$_SESSION("leave_app_id");
//    }else{
//        $id=1;
//    }
//    if($USERTYPE==5){
//        $user = new studentUser($USERID, $DB);
//    }
    switch($USERTYPE){
        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
        case 5:
            $user= new studentUser($USERID, $uDB);
            break;        
           
    }
    $firstname= $user->getFirstName();
    $name= $user->getFullName();
?>
<html>
    <head>
        <title>Hello <?php echo $name; ?></title>
    </head>
    <body>
        <h2>Hello <?php echo $name; ?></h2>
        <h3>Your first name is <?php echo $firstname; ?><h3>
        <a href="logout.php">Logout</a>
    </body>
</html>