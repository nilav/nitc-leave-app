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
<!--                <input typehttp://en.wikipedia.org/wiki/Graduate_Aptitude_Test_in_Engineering="hidden" name="userid" id="userid" value="<?php echo $USERID ?>" />-->
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
    ?>
    <tr>
        <td class="leave_type">  <?php echo $row[2];?></td>
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
                <div class="leave_modify"><img src="../static/images/modify.png" alt="Modify Leave" /></div>
                <div class="leave_delete"><img src="../static/images/delete.png" alt="Delete Leave" /></div>
            <?php } ?>
            </div>
        </td>
<!--    </div>-->
    </tr>
    
    <?php }?>
    </table>  
</div>