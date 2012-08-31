<!--
TODO: Apply client and server side apply form validation.
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    
    $leave_type=$lDB->getLeaveType();
    $leave_type1=$lDB->getLeaveType();
    $leave_history= $lDB->getLeaveHistory($USERID);
    
?>
<div id="leave_status_button" class="leave_button">
    <span class="toogle_button">Leave Status</span>
</div>

<div id="leave_status">
    <table border="1">
        <tr>
            <th>Leave Type</th>
            <th>Totals</th>
            <th>Used</th>
            <th>Remaining</th>
        </tr>
    <?php while($row1=  mysql_fetch_row($leave_type1)) {
        $max_leave=$row1[3];
        $app_history=$lDB->getLeaveTypeHistory($USERID,$row1[0]);//here $row[0] is leave_id
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
        ?>
        
        <tr>
            <td><?php echo $row1[1];?></td>
            <td><?php echo $max_leave;?></td>
            <td><?php echo $used_leave;?></td>
            <td><?php echo $balanced_leave; ?></td>
        </tr>    
        
   <?php }?>
    </table>  
</div>
<div id="leave_form_button" class="leave_button" >
    <span class="toggle_button">Apply for leave</span>
</div>
<div id="apply_leave">
    <div id="leave_form">
        <form name="application"  action="#" >
            <fieldset>
                <legend>Apply For Leave</legend>
<!--                <input typehttp://en.wikipedia.org/wiki/Graduate_Aptitude_Test_in_Engineering="hidden" name="userid" id="userid" value="<?php echo $USERID ?>" />-->
                    <div class="selectbox">
                        <span class="text">Leave Type</span>
                        <select name="leave_type" id="leave_type">
                            <?php while($row=  mysql_fetch_row($leave_type))
                            {
                            ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                            <?php
                            }
                            ?>                
                        </select>
                    </div>
                    <div class="textbox">
                            <span class="text">Starting Date</span>
                            <input type="text" name="s_date" id="s_date" placeholder="Starting Date" />
                            <label class="error" for="s_date" id="s_date_error">Enter Valid date</label>
                    </div>
                    <div class="textbox">
                            <span class="text">Ending Date</span>
                            <input type="text" name="e_date" id="e_date" placeholder="Ending Date" />
                            <label class="error" for="e_date" id="e_date_error">Enter Valid date</label>
                    </div>
                    <div class="textbox">
                            <span class="text">Reason for leave</span>
                            <textarea id="leave_reason" name="reason" row="4" column="10" placeholder="What is the reason buddy...."></textarea>
                            <label class="error" for="reason" id="leave_reason_error">This field required</label>
                    </div>
                    <div class="btn_1" id="submit_application">
                        <input type="button" name="submit" id="submit_button" Value="Apply" onClick="applyLeave()"/>
                    </div>
                </fieldset>
        </form> 
    </div>
    <br/>
</div>


<!--Cancel Your Leave-->


<div id="leave_history_button" class="leave_button" >
    <span class="toggle_button">Leave History</span>
</div>

<div id="leave_history">
    <?php if($leave_history){ ?>
    <table border="1">
        <tr>
        <th> Leave Type</th>
        <th>Starting Date</th>
        <th>Ending Date</th>
        <th>Reason</th>
        <th>Status</th>
        </tr>
<!--        <th>Approve/Cancel</th>-->
    <?php while($row=  mysql_fetch_row($leave_history))
    {
        $leave_name=$lDB->getLeaveName($row[2]);
    ?>
        <tr id="applicationInfoRow<?php echo $row[0]?>">
            <td class="leave_type">  <?php echo $leave_name;?></td>
            <td class="leave_s_date"><?php echo $row[3];?></td>
            <td class="leave_e_date"><?php echo $row[4];?></td>
            <td class="leave_reason"><?php echo $row[5];?></td>
            <td class="leave_status">
                    <?php if($row[6]==0){?>
                        Pending on FA
                    <?php }elseif($row[6]==1){?>
                        Canceled by FA
                    <?php }elseif($row[6]==2){?>
                        Pending on HOD
                    <?php }elseif($row[6]==3){?>
                        Canceled by HOD
                    <?php }elseif($row[6]==4){?>
                        Approved
                    <?php }elseif($row[6]==5){?>
                        Canceled by you
                    <?php }else{?>
                        Unknown Status
                    <?php }?>

            </td>


            <td><div class="leave_edit divCell">
                <?php if($row[6]==0 || $row[6]==2){?>
                    <div id="modify<?php echo $row[0];?>" class="leave_modify" onclick="editLeave(<?php echo $row[0];?>)"><img src="../static/images/modify.png" alt="Modify Leave" /></div>
                    <div id="delete<?php echo $row[0];?>" class="leave_delete" onclick="deleteLeave(<?php echo $row[0];?>)"><img src="../static/images/delete.png" alt="Delete Leave" /></div>
                <?php } ?>
                </div>
            </td>
    <!--    </div>-->
        </tr>
    
    <?php }?>
    </table>  
    <?php }else{ ?>
    <span class="no_request"> You haven't applied for any leave yet.</span>
<?php } ?>
</div>

 