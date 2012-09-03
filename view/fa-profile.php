<!--
    TODO: Apply client and server side apply form validation.
    To change this template, choose Tools | Templates
    and open the template in the editor.
-->
<?php 
    $user_student=5;
    $leave_type=$lDB->getLeaveType();
    $leave_history= $lDB->getLeaveHistory($USERID);
    $department_type= $user->getDepartment();
    $activation_pending=$uDB->getPendingStudentActivationRequest($department_type,$user_student);
    
?>

<div id="pending_account_button">
     <span class="toggle_button">Pending Account Verification Requests</span>    
</div>

<div id="pending_activation_request">
    <?php if($activation_pending){ ?> 
    <table border="1">
        <tr>
            <th> <div class="name divCell">  Name</div></th>
            <th><div class="roll_no divCell divCellMedium">Roll Number</div></th>
            <th><div class="category divCell divCellSmall">Category</div></th>
            <th><div class="gender divCell divCellSmall">Gender</div></th>
            <th><div class="email divCell divCellLarge">Email</div></th>
            <th><div class="contact divCell divCellMedium">Contact Number</div></th>
            <th><div class="request_time divCell">Pending since...</div></th>
        </tr>
   
    <?php while($row=  mysql_fetch_row($activation_pending))
    {
        $fname=$row[0].' '.$row[1];
    ?>
    <tr id="userInfoRow<?php echo $row[9];?>">
        <td><div class="name divCell">  <?php echo $fname; ?></div></td>
        <td><div class="roll_no divCell divCellMedium"><?php echo $row[7] ?></div></td>
        <td><div class="category divCell divCellSmall"><?php echo $row[8] ?></div></td>
        <td><div class="gender divCell divCellSmall"><?php echo $row[4] ?></div></td>
        <td><div class="email divCell divCellLarge"><?php echo $row[2] ?></div></td>
        <td><div class="contact divCell divCellMedium"><?php echo $row[3] ?></div></td>
        <td><div class="request_time divCell"><?php echo $row[6] ?></div></td>
        
        <td><div id="pending_edit<?php echo $row[9];?>" class="pending_edit divCell">
                <div id="approve<?php echo $row[9];?>" class="leave_modify" onclick="approveRequest(<?php echo $row[9];?>)"><img src="../static/images/approve.png" alt="Approve Request" /></div>
                <div id="reject<?php echo $row[9];?>" class="leave_delete" onclick="rejectRequest(<?php echo $row[9];?>)"><img src="../static/images/cancel.png" alt="Reject request" /></div>            
        </div></td>
    </tr>   
   
    <?php }?>
</table>
    <?php }else{ ?>
    <span class="no_request"> You haven't any account activation request.</span>
<?php } ?>
</div>
<?php 
//Getting Pending Application List...
    $app_status=0;  //pending on FA
    $application_pending=$lDB->getPendingApplication($department_type, $app_status);
?>
<div id="pending_account_button">
     <span class="toggle_button">Pending Leave Application Requests</span>    
</div>

<div id="pending_application_request">
    <?php if($application_pending){ ?>
    <table border="1">
    <tr>
        <th><div class="name divCell">  Name</div></th>
        <th><div class="roll_no divCell divCellMedium">Roll Number</div></th>
        <th><div class="leave_type divCell divCellMedium">Leave Type</div></th>
        <th><div class="leave_reason divCell divCellLarge">Leave Reason</div></th>
        <th><div class="s_date divCell divCellMedium">Start Date</div></th>
        <th><div class="e_date divCell divCellMedium">End Date</div></th>
        <th><div class="request_time divCell">Pending since...</div></th>
    </tr>
    <?php while($row=  mysql_fetch_row($application_pending))
    {
        $leave_name=$lDB->getLeaveName($row[5]);
        $fname=$row[2].' '.$row[3];
    ?>
    <tr id="pendingAppInfoRow<?php echo $row[0];?>">
        <td><div class="name divCell"><a class="personPopupTrigger" href="" rel="2128,<?php echo $row[1]; ?>">  <?php echo $fname; ?></a></div></td>
        <td><div class="roll_no divCell divCellMedium"><?php echo $row[4]; ?></div></td>
        <td><div class="leave_type divCell divCellMedium"><?php echo $leave_name; ?></div></td>
        <td><div class="leave_reason divCell divCellLarge"><?php echo $row[6]; ?></div></td>
        <td><div class="s_date divCell divCellMedium"><?php echo $row[7]; ?></div></td>
        <td><div class="e_date divCell divCellMedium"><?php echo $row[8]; ?></div></td>
        <td><div class="request_time divCell"><?php echo $row[9] ?></div></td>
     
        <td><div id="pending_edit<?php echo $row[0]; ?>"class="pending_edit divCell">
                <div class="leave_modify" onclick="approveLeave(<?php echo $row[0]; ?>)"><img src="../static/images/approve.png" alt="Approve Leave" title="Approve Leave" /></div>
                <div class="leave_delete" onclick="rejectLeave(<?php echo $row[0]; ?>)"><img src="../static/images/cancel.png" alt="Reject Leave" title="Reject Leave"/></div>            
        </div></td>
    </tr>
    
    <?php }?>
    </table>
    <?php }else{ ?>
    <span class="no_request"> You haven't any application for leave.</span>
<?php } ?>
</div>