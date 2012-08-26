<!--
TODO: Apply client and server side apply form validation.
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    
    $leave_type=$lDB->getLeaveType();
    $leave_history= $lDB->getLeaveHistory($USERID);
?>
<div id="leave_form_button" class="leave_button" >
    <span class="toggle_button">Apply for leave</span>
</div>
<div id="apply_leave">
    <div id="leave_form">
        <form name="application"  action="#" >
            <fieldset>
                <legend>Apply For Leave</legend>
<!--                <input type="hidden" name="userid" id="userid" value="<?php echo $USERID ?>" />-->
                    <div class="selectbox">
                        <span class="text">Leave Type</span>
                        <select name="leave_type" id="leave_type">
                            <?php while($row=  mysql_fetch_row($leave_type))
                            {
                            ?>
                            <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
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
    <div class="headRow">
        <div class="leave_type divCell">  Leave Type</div>
        <div class="leave_s_date divCell">Starting Date</div>
        <div class="leave_e_date divCell">Ending Date</div>
        <div class="leave_reason divCell">Reason</div>
        <div class="leave_status divCell">Status</div>
    </div>
    <?php while($row=  mysql_fetch_row($leave_history))
    {
    ?>
    <div class="divRow">
        <div class="leave_type divCell">  <?php echo $row[2];?></div>
        <div class="leave_s_date divCell"><?php echo $row[3];?></div>
        <div class="leave_e_date divCell"><?php echo $row[4];?></div>
        <div class="leave_reason divCell"><?php echo $row[5];?></div>
        <div class="leave_status divCell">
            <?php if($row[6]==0){?>
                <div class="leave_pending">Pending on FA</div>
            <?php }elseif($row[6]==1){?>
                <div class="leave_cancel">Canceled by FA</div>
            <?php }elseif($row[6]==2){?>
                <div class="leave_pending">Pending on HOD</div>
            <?php }elseif($row[6]==3){?>
                <div class="leave_cancel">Canceled by HOD</div>
            <?php }elseif($row[6]==4){?>
                <div class="leave_approved">Approved</div>
            <?php }elseif($row[6]==5){?>
                <div class="leave_cancel">Canceled by you</div>
            <?php }else{?>
                <div class="leave_cancel">Unknown Status</div>
            <?php }?>
        </div>
        
        <div class="leave_edit divCell">
            <?php if($row[6]==0 || $row[6]==2){?>
                <div class="leave_modify"><img src="../static/images/edit.png" alt="Modify Leave" /></div>
                <div class="leave_delete"><img src="../static/images/delete.png" alt="Delete Leave" /></div>
            <?php } ?>
        </div>
       
    </div>
    <?php }?>
</div>