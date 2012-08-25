<?php
    include 'checkid.php';
    include 'DB/initDB.php';
    include 'DB/userDB.php';
    include 'DB/leaveDB.php';
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
        
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
<!--        <script type="text/javascript" src="static/js/jquery.js"></script>-->
<!--        <script type="text/javascript" src="static/js/datepicker.js"></script>-->
        <script type="text/javascript" src="static/js/application.js"></script>
    </head>
    <body>
        <?php 
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
                    include 'view/student-profile.php';
                    break;   
            }
        ?>
        <h2>Hello <?php echo $name; ?></h2>
        <h3>Your first name is <?php echo $firstname; ?><h3>
        <a href="logout.php">Logout</a>
    </body>
</html>