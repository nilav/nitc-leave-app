<?php
    function applyLeave($lDB, $userId, $leave_type, $s_date, $e_date, $reason){
       $re = $lDB->applyLeave($userId, $leave_type, $s_date, $e_date, $reason);
       return $re;
        
    }

    require_once '../checkid.php';
    require_once '../DB/initDB.php';
    require_once '../DB/userDB.php';
    require_once '../DB/leaveDB.php';
    $uDB = new userDB();
    $lDB = new leaveDB();
    $userId= $USERID;
    $param=$_POST['param'];
    
    if($param == "submit_leave_application"){
        $leave_type=$_POST['leave_type'];
        $s_date= $_POST['s_date'];
        $e_date= $_POST['e_date'];
        $reason= $_POST['reason'];
        $reply=applyLeave($lDB, $userId, $leave_type, $s_date, $e_date, $reason);
        if($reply){
            return 1;
        }else{
            return 0;
        }
    }
    
//    return $data;
?>
