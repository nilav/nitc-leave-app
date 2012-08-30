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
    function addDepartment($dDB, $dept_name, $dept_desc){
        $re= $dDB->addDepartment($dept_name, $dept_desc);
        if($re){
            $html="";
            $html=$html.'<tr><td>'.$dept_name.'</td><td colspan="2">'.$dept_desc.'</td></tr>';
            echo $html;
        }
    }





    require_once '../DB/initDB.php';
    require_once '../DB/leaveDB.php';
    require_once '../DB/userDB.php';
    require_once '../DB/departmentDB.php';
    require_once '../checkid.php';
    
    $lDB= new leaveDB();
    $uDB= new userDB();
    $dDB= new departmentDB();
    $param= mysql_escape_string(trim($_POST['param']));
    
    if($param==approveRequest){
        $uid=  mysql_escape_string(trim($_POST['uid']));
        approveRequest($uDB, $uid);
    }elseif($param==rejectRequest){
        $uid= mysql_escape_string(trim($_POST['uid']));
        rejectRequest($uDB, $uid);
    }elseif($param==addDepartment){
        $dept_name=  mysql_escape_string(trim($_POST['dept_name']));
        $dept_desc= mysql_escape_string(trim($_POST['dept_desc']));
        
        addDepartment($dDB, $dept_desc, $dept_name);
        
    }
?>
