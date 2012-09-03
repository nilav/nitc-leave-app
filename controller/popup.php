<?php
    function getLeaveStatus($lDB, $uid){
        $html="<div class='personPopupResult'>";
        $html=$html.'<div id="leave_status">
                        <table border="1">
                            <tr>
                                <th>Leave Type</th>
                                <th>Totals</th>
                                <th>Used</th>
                                <th>Remaining</th>
                            </tr>';
        $leave_type=$lDB->getLeaveType();
        while($row1=  mysql_fetch_row($leave_type)) {
        $max_leave=$row1[3];
        $app_history=$lDB->getLeaveTypeHistory($uid,$row1[0]);//here $row[0] is leave_id
        $used_leave=0;
        $balanced_leave = 0;
        while($row=mysql_fetch_row($app_history)){
            $startdate = $row[1];
            $enddate = $row[2];
            $timestamp_start = strtotime($startdate);
            $timestamp_end = strtotime($enddate);
            $difference = abs($timestamp_end - $timestamp_start);
            $days = floor($difference/(60*60*24));
            $used_leave = $used_leave + $days;           
        }
        $balanced_leave = $max_leave - $used_leave;        
        $html=$html.'<tr><td>'.$row1[1].'</td><td>'.$max_leave.'</td><td>'.$used_leave.'</td>';
        $html=$html.'<td>'.$balanced_leave.'</td></tr>';          
        }
        $html=$html."</table></div></div>";
        echo $html; 
    }





    require_once '../DB/initDB.php';
    require_once '../DB/leaveDB.php';
    require_once '../DB/userDB.php';
    require_once '../checkid.php';
    
    $lDB= new leaveDB();
    $uDB= new userDB();
    
    $param=$_GET['param'];
    if($param==leavePopup){
        $uid=$_GET['uid'];
        getLeaveStatus($lDB,$uid);
    }
        
?>
