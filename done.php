<?php

    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }else{
        header('Location: .');
        die();
    }
    
//    Action CODES
//    1: For registration
    
    switch($act){
        case 1:
            $msg="Thank you for registration will varify it as soon as possible by concerned authority. When varified you will get the mail. Till then stay tight.<br /><a href='index.php'>Click here</a> to go to main page.";
            $action= 'Registration Completed';
            break;
        default :
            $msg= 'Page not found.';
            $action ='404 Error';
            break;
    }
?>

<html>
    <head>
        <title><?php echo $action;?></title>
    </head>
    <body>
        <div id="message">
            <h3><?php echo $msg;?></h3>
        </div>
    </body>
</html>
