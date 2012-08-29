<?php
    function editLeave($lDB, $aid){
        $info= $lDB->getApplicationInfo($aid);
        $leave_type=$lDB->getLeaveType();
        $app_info=  mysql_fetch_row($info);//assigning application info in $app_info
        if($app_info[5]==0){
            $app_status="Pending on FA";
        }elseif($app_info[5]==2){
            $app_status="Pending on HOD";
        }
        $html="";
        $html="<td><select name='leave_type' class='leave_type'>";
        while($row=  mysql_fetch_row($leave_type)){            
            $html=$html."<option value='".$row[1]."'>".$row[1]."</option>";
        }
        $html=$html.'</select></td>';
        $html=$html.'<td><input type="text" name="s_date" id="s_date" class="leave_s_date" placeholder="'.$app_info[2].'"/></td>';
        $html=$html.'<td><input type="text" name="e_date" id="e_date" class="leave_e_date" placeholder="'.$app_info[3].'"/></td>';
        $html=$html.'<td><textarea  class="leave_reason" name="reason" row="4" column="10" style="width:100%;"value="'.$app_info[4].'" ></textarea></td>';
        $html=$html.'<td><span>'.$app_status.'</span>';
        $html=$html.'<td><div class="leave_edit "> <div id="update'.$aid.'" class="leave_modify" onclick="updateLeave('.$aid.')"><img src="../static/images/approve.png" alt="Update Leave" /></div>';
        $html=$html.'<div id="cancel'.$aid.' " class="leave_cancel" onclick="cancelEditLeave('.$aid.')"><img src="../static/images/delete.png" alt="Cancel" /></div></div></td>';
        echo $html;                   
    }
    
    function updateLeaveInfo($lDB,$apid,$s_date,$e_date,$leave_type,$leave_reason){
        $re= $lDB->updateLeaveInfo($apid,$s_date,$e_date,$leave_type,$leave_reason);
        if($re){
            $html="";
            $html=$html.'<td class="leave_type">'.$leave_type.'</td>';
            $html=$html.'<td class="leave_s_date">'.$s_date.'</td>';
            $html=$html.'<td class="leave_e_date">'.$e_date.'</td>';
            $html=$html.'<td class="leave_reason">'.$leave_reason.'</td>';
            $html=$html.'<td class="leave_status">Pending on FA</td>';
            $html=$html.'<td><div class="leave_edit divCell">';              
            $html=$html.'<div id="modify'.$apid.'" class="leave_modify" onclick="editLeave('.$apid.')"><img src="../static/images/modify.png" alt="Modify Leave" /></div>';
            $html=$html.'<div id="delete'.$apid.'" class="leave_delete" onclick="deleteLeave('.$apid.')"><img src="../static/images/delete.png" alt="Delete Leave" /></div>';
            $html=$html.'</div></td>';
            echo $html;
        }
    }
    
    function deleteLeave($lDB, $apid){
        $re=$lDB->deleteLeave($apid);
        if($re){
            $html="";
            $html=$html."<td colspan='5' class='leaveDeleted'>Leave Deleted Sucessfully</td>";
            echo $html;
        }
    }



    require_once '../DB/initDB.php';
    require_once '../DB/leaveDB.php';
    require_once '../DB/userDB.php';
    require_once '../checkid.php';
    
    $lDB= new leaveDB();
    $uDB= new userDB();
//    $userId= $USERID;
    $param= mysql_escape_string(trim($_POST['param']));
//    $param="editLeave";
    
    if($param==editLeave){
        $apid= mysql_escape_string(trim($_POST['apid']));
//        $aid=19;
        editLeave($lDB, $apid);
    }elseif($param==updateLeave){
        $apid=  mysql_escape_string(trim($_POST['apid']));
        $s_date=mysql_escape_string(trim($_POST['s_date']));
        $e_date=mysql_escape_string(trim($_POST['e_date']));
        $leave_type=mysql_escape_string(trim($_POST['leave_type']));
        $leave_reason=mysql_escape_string(trim($_POST['leave_reason']));
        updateLeaveInfo($lDB,$apid,$s_date,$e_date,$leave_type,$leave_reason);        
    }elseif($param==deleteLeave){
        $apid= mysql_escape_string(trim($_POST['apid']));
        deleteLeave($lDB,$apid);
    }
    
?>
