<?php
    function approveRequest($uDB, $uid){
        $re=$uDB->approveRequest($uid);
        if($re){
            $html="";
            $html=$html.'<span class="approved">Approved</span>';
            echo $html;
        }
    }
    
    function rejectRequest($uDB, $uid){
        $user_type=$uDB->getUserType($uid);
        // user_type 5 is student where student_info table has foreign key relation with user table so to delete user row student row need to be deleted
        if($user_type==5){
            $re= $uDB->deleteStudentInfo($uid);
            $re1= $uDB->deleteUser($uid);
        }else{
            $re2=$uDB->deleteUser($uid);
        }
        if(($re && $re1) || $re2){
            $html="";
            $html=$html.'<span class="approved">Rejected</span>';
            echo $html;
        }
    }







    require_once '../DB/initDB.php';
    require_once '../DB/leaveDB.php';
    require_once '../DB/userDB.php';
    require_once '../checkid.php';
    
    $lDB= new leaveDB();
    $uDB= new userDB();
    $param= mysql_escape_string(trim($_POST['param']));
    
    if($param==approveRequest){
        $uid=  mysql_escape_string(trim($_POST['uid']));
        approveRequest($uDB, $uid);
    }elseif($param==rejectRequest){
        $uid= mysql_escape_string(trim($_POST['uid']));
        rejectRequest($uDB, $uid);
    }
?>
