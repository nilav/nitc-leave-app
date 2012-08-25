<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    
    $leave_type=$lDB->getLeaveType();
?>
<div id="leave_button" >
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
<div id="leave_button" >
    <span class="toggle_button">Leave History</span>
</div>
<div id="leave_history">
    
</div>