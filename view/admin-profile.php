<!--
    TODO: Apply client and server side apply form validation.
    To change this template, choose Tools | Templates
    and open the template in the editor.
-->
<?php 
    $user_hod=2;
    $leave_type=$lDB->getLeaveType();
    $leave_history= $lDB->getLeaveHistory($USERID);
//    $department_type= $user->getDepartment();
    $activation_pending=$uDB->getPendingHodActivationRequest($user_hod);
    
?>

<div id="pending_account_button">
     <span class="toggle_button">Pending Account Verification Requests</span>    
</div>
<div id="pending_activation_request">
    <table border="1">
        <tr>
            <th><div class="name divCell">  Name</div></th>        
            <th><div class="dept_name divCell"> Department</div></th>
            <th><div class="user_type divCell">User Type</div></th>
            <th><div class="email divCell divCellLarge">Email</div></th>
            <th><div class="contact divCell divCellMedium">Contact Number</div></th>
            <th><div class="gender divCell divCellSmall">Gender</div></th>
            <th><div class="request_time divCell">Pending since...</div></th>
        </tr>
    <?php while($row=  mysql_fetch_row($activation_pending))
    {
        $fname=$row[0].' '.$row[1];
        $department_name=$uDB->getDepartmentName($row[7]);
    ?>
    <tr>
        <td><div class="name divCell">  <?php echo $fname; ?></div></td>        
        <td><div class="dept_name divCell"><?php echo $department_name; ?></div></td>
        <td><div class="user_type divCell">Head of Department</div></td>
        <td><div class="email divCell divCellLarge"><?php echo $row[2] ?></div></td>
        <td><div class="contact divCell divCellMedium"><?php echo $row[3] ?></div></td>
        <td><div class="gender divCell divCellSmall"><?php echo $row[4] ?></div></td>
        <td><div class="request_time divCell"><?php echo $row[6] ?></div></td>
        
        <td>
            <div class="pending_edit divCell">
                <div class="leave_modify"><img src="../static/images/approve.png" alt="Approve Request" /></div>
                <div class="leave_delete"><img src="../static/images/cancel.png" alt="Reject request" /></div>            
            </div>
        </td>
    </tr>  
    
    <?php }?>
    
    </table>
</div>