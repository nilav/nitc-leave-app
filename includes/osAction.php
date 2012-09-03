<?php
    function editDate($lDB, $uDB, $dDB,$dept_id){
        
        $dDB= new departmentDB();
        $leave_types=$lDB->getLeaveType();
//        $dept_id=$uDB->getDepartmentId($USERID);
        $dept_name=$dDB->getDepartmentName($dept_id);
        $semStartDate=$dDB->getsemStartDate($dept_id);
        $semEndDate=$dDB->getsemEndDate($dept_id);
        $html="";
        $html='<h3>Semester Start Date&nbsp;&nbsp;<div id="sems_date" > <input type="text" name="s_date" id="s_date" value="'.$semStartDate.'" /></div>&nbsp;&nbsp;Semester End Date&nbsp;&nbsp;<div id="seme_date"> <input type="text" name="s_date" id="s_date" value="'.$semEndDate.'" /></div></h3>';
        $html=$html.'<input type="button" name="change" id="update" value="update" onclick="updateDate('. $dept_id.');" />';
        echo $html;
    }
    
    function updateDate($dDB, $s_date,$e_date,$dept_id){
        $re1=$dDB->setsemStartDate($dept_id, $s_date);
        $re2=$dDB->setsemEndDate($dept_id, $e_date);
        
            $html="";
            $html=$html.'<h3>Semester Start Date&nbsp;&nbsp;<div id="sems_date" >'.$s_date.'</div>&nbsp;&nbsp;Semester End Date&nbsp;&nbsp;<div id="seme_date">'.$e_date.'</div></h3>
                    <input type="button" name="change" id="change"value="change" onclick="editDate('.$dept_id.');" />';
            echo $html;
        
    }



    require_once '../DB/initDB.php';
    require_once '../DB/leaveDB.php';
    require_once '../DB/userDB.php';
    require_once '../DB/departmentDB.php';
    require_once '../checkid.php';
    
    $lDB= new leaveDB();
    $uDB= new userDB();
    $dDB=new departmentDB();
    $param= mysql_escape_string(trim($_POST['param']));
    
    if($param==editDate){
        $dept_id=  mysql_escape_string(trim($_POST['dept_id']));
        editDate($lDB, $uDB, $dDB,$dept_id);
    }elseif($param==updateDate){
        $dept_id=  mysql_escape_string(trim($_POST['dept_id']));
        $s_date=  mysql_escape_string(trim($_POST['s_date']));
        $e_date=  mysql_escape_string(trim($_POST['e_date']));
        updateDate($dDB,$s_date, $e_date,$dept_id);
    }
?>
