<?php
    include 'checkid.php';
    include 'DB/initDB.php';
    include 'DB/userDB.php';
    
    $uDB= new userDB();
//    if(isset($_SESSION("leave_app_id"))){
//        $id=$_SESSION("leave_app_id");
//    }else{
//        $id=1;
//    }
    $name=$uDB->getUserFullName($USERID);
?>
<html>
    <head>
        <title>Hello <?php echo $name; ?></title>
    </head>
    <body>
        <h2>Hello <?php echo $name; ?></h2>
        <a href="logout.php">Logout</a>
    </body>
</html>