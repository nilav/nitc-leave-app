<?php
    include 'checkid.php';
    include 'DB/initDB.php';
    include 'DB/userDB.php';
    include 'DB/leaveDB.php';
    include 'DB/departmentDB.php';
    include 'classes/user.class.php';
    
//    $USERID & $USERTYPE are session variable....
    
    $uDB= new userDB();
    $lDB= new leaveDB();
    
    
    $user= new user($USERID, $uDB);
    
//    if(isset($_SESSION("leave_app_id"))){
//        $id=$_SESSION("leave_app_id");
//    }else{
//        $id=1;
//    }
//    if($USERTYPE==5){
//        $user = new studentUser($USERID, $DB);
//    }
   
    $firstname= $user->getFirstName();
    $name= $user->getFullName();
?>
<html>
    <head>
        <title>Hello <?php echo $name; ?></title>
        <link rel="stylesheet" media="screen" type="text/css" href="static/css/profile.css" />        
        <link rel="stylesheet" type="text/css" href="static/css/jquery-ui.css"/>
        
        <script type="text/javascript" src="static/js/jquery.min.js"></script>
<!--        <script type="text/javascript" src="static/js/jquery.js"></script>-->
        <script type="text/javascript" src="static/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="static/js/application.js"></script>
        <script type="text/javascript" src="static/js/profile.js"></script>
        
       
    </head>
    <body>
        <?php 
    //For Admin user_type=1  
    //For HOD user_type=2
    //Faculty Advisor user_type=3
    //Office Staff user_type=4
    //Student user_type=5
    //For Office Staff Department id is equal to 0 that means they don't belong to any department
            switch($USERTYPE){
                case 1:
                    $user=new AdminUser($USERID, $uDB);
                    include 'view/admin-profile.php';
                    break;
                case 2:
                    $user=new HODUser($USERID, $uDB);
                    include 'view/hod-profile.php';
                    break;
                case 3:
                    $user= new FAUser($USERID, $uDB);
                    include 'view/fa-profile.php';
                    break;
                case 4:
                    break;
                case 5:
                    $user= new studentUser($USERID, $uDB);
                    include 'view/student-profile.php';
                    break;   
            }
        ?>
        <h2>Hello <?php echo $name; ?></h2>
        <h3>Your first name is <?php echo $firstname; ?><h3>
        <a href="logout.php">Logout</a>
    </body>
</html>