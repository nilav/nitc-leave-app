<!--
    TODO: Apply client and server side apply form validation.
    To change this template, choose Tools | Templates
    and open the template in the editor.
-->
<?php 
   $user_hod=2;
   $dDB=new departmentDB();
//    $department_type= $user->getDepartment();
    $activation_pending=$uDB->getPendingHodActivationRequest($user_hod);
    
?>

<div id="pending_account_button">
     <span class="toggle_button">Pending Account Verification Requests</span>    
</div>
<?php if($activation_pending){ ?>
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
        $department_name=$dDB->getDepartmentName($row[7]);
    ?>
    <tr id="pendingAppInfoRow<?php echo $row[8];?>">
        <td><div class="name divCell">  <?php echo $fname; ?></div></td>        
        <td><div class="dept_name divCell"><?php echo $department_name; ?></div></td>
        <td><div class="user_type divCell">Head of Department</div></td>
        <td><div class="email divCell divCellLarge"><?php echo $row[2] ?></div></td>
        <td><div class="contact divCell divCellMedium"><?php echo $row[3] ?></div></td>
        <td><div class="gender divCell divCellSmall"><?php echo $row[4] ?></div></td>
        <td><div class="request_time divCell"><?php echo $row[6] ?></div></td>
        
        <td>
            <div id="pending_edit<?php echo $row[8]; ?>" class="pending_edit divCell">
                <div id="approve<?php echo $row[8];?>" class="leave_modify" onclick="approveRequest(<?php echo $row[8];?>)"><img src="../static/images/approve.png" alt="Approve Request" /></div>
                <div id="reject<?php echo $row[8];?>" class="leave_delete" onclick="rejectRequest(<?php echo $row[8];?>)"><img src="../static/images/cancel.png" alt="Reject request" /></div>            
            </div>
        </td>
    </tr>  
    
    <?php }?>
    
    </table>
</div>
<?php }else{ ?>
<span class="no_request"> You have no new account verification request.</span>
<?php } 
    $dept_list=$dDB->getDepartmentList();    
?>
<div id="department_list_button">
     <span class="toggle_button">Department List</span>    
</div>

<div id="department_list">
    <table border="1">
        <tr id="tab_header">
            <th>Department</th>
            <th>Description</th>
            <th><div id="add_department" onclick="addDepartmentRow();"><img src="../static/images/add.png" alt="Add new Department" /></div></th>
        </tr>
        <?php while($list= mysql_fetch_row($dept_list)){?> 
        <tr>
            <td><?php echo $list[1]; ?></td>
            <td colspan="2"><?php echo $list[2]; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
