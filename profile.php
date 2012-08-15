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
    $name=$uDB->getFullName($USERID);
    $firstname= $user->getFirstName();
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