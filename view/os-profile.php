<?php 
    $dDB= new departmentDB();
    $leave_types=$lDB->getLeaveType();
    $dept_id=$uDB->getDepartmentId($USERID);
    $dept_name=$dDB->getDepartmentName($dept_id);
    $semStartDate=$dDB->getsemStartDate($dept_id);
    $semEndDate=$dDB->getsemEndDate($dept_id);
    
?>
<h2 style="text-align: center;"> <?php echo $dept_name;?></h2>
<div id="semdate">
<h3>Semester Start Date&nbsp;&nbsp;<div id="sems_date" > <?php echo $semStartDate; ?></div>&nbsp;&nbsp;Semester End Date&nbsp;&nbsp;<div id="seme_date"> <?php echo $semEndDate; ?></div></h3>
<input type="button" name="change" id="change"value="change" onclick="editDate(<?php echo $dept_id; ?>);" />
</div>
<table border="1">
    <tr>
        <th>Sl No.</th>
        <th>Roll No.</th>
        <th>Name</th>
        <th>Category</th>
        <th>Date of Absence</th>
        <th>
            <table border="1">
                <tr border="1">
                    <th colspan="3">Details of Leave</th>
                </tr>
                <tr>
                    <td  colspan="3">Sanctioned leave till the end of last month.  </td> 
                </tr>
                <tr>
                    <?php while ($row3 = mysql_fetch_row($leave_types)) {?>
                    <td  style="width:5pc"><?php echo $row3[1];?></td>
                    <?php } ?>                   
                </tr>
            </table>    
        </th>
        
    </tr>
<?php 
    $counter=1;
    $student_info=$uDB->getStudentInfo();
    while($row=mysql_fetch_row($student_info)){
        $appliciant_name=$uDB->getFullName($row[0]);
?>
    <tr>
        <td><?php echo $counter++;?></td>
        <td><?php echo $row[1];   ?></td>
        <td><?php echo $appliciant_name;     ?></td>
        <td><?php echo $row[2];   ?> </td>
        <td>
        <?php 
            $uid=$row[0];
            $app_detail=$lDB->getLeaveHistoryByStatus($row[0]); //Here $row[0] states student_id...
            if($app_detail){
                while($appInfo=  mysql_fetch_row($app_detail)){?>
                <table border="1">
                    <tr>
                        <td>From:&nbsp;&nbsp;<?php echo $appInfo[3]; ?>&nbsp;&nbsp;To:&nbsp;&nbsp;<?php echo $appInfo[4];?>&nbsp;&nbsp;
                        <?php 
                            if($appInfo[6]==1 || $appInfo[6]==3){
                                echo "Canceled";
                            }elseif($appInfo[6]==4){
                                echo "Approved";
                            }
                        ?>
                        </td>
                    </tr>
                </table>
                <?php }                
            }else{ ?>
            <div style="text-align:center;">Nil</div>   
        <?php    }
?>
        </td>
        <td>
            <table border="1">
                <tr>
        <?php 
             $leave_type=$lDB->getLeaveType();
                while($row1=  mysql_fetch_row($leave_type)) {
                    $max_leave=$row1[3];
                    $app_history=$lDB->getLeaveTypeHistory($uid,$row1[0]);//here $row[0] is leave_id
                    $used_leave=0;
                    $balanced_leave = 0;
                    while($row2=mysql_fetch_row($app_history)){
                        $startdate = $row2[1];
                        $enddate = $row2[2];
                        $timestamp_start = strtotime($startdate);
                        $timestamp_end = strtotime($enddate);
                        $difference = abs($timestamp_end - $timestamp_start);
                        $days = floor($difference/(60*60*24));
                        $used_leave = $used_leave + $days;           
                    }
                    ?>
                    <td  style="width:8.3pc; text-align: center;"><?php if($used_leave==0){
                                    echo "...";                                    
                            }else{
                                echo "$used_leave";
                            }
                        
                        ?>    </td>
                <?php }
        ?>
                </tr>
            </table>
        </td>
    </tr>
    
        
<?php
    }    
?>
    
</table>

<?php

$leave_types1=$lDB->getLeaveType();
$html="";
$html=$html.'<table border="1">
    <tr>
        <th>Sl No.</th>
        <th>Roll No.</th>
        <th>Name</th>
        <th>Category</th>
        <th>Date of Absence</th>
        <th>
            <table border="1">
                <tr border="1">
                    <th colspan="3">Details of Leave</th>
                </tr>
                <tr>
                    <td  colspan="3">Sanctioned leave till the end of last month.  </td> 
                </tr>
                <tr>';
               while ($row3 = mysql_fetch_row($leave_types1)) {
$html=$html.'                    <td  style="width:5pc">'.$row3[1].'</td>';
                     }                   
$html=$html.'                </tr>
            </table>    
        </th>
        
    </tr>';
 
    $counter=1;
    $student_info=$uDB->getStudentInfo();
    while($row=mysql_fetch_row($student_info)){
        $appliciant_name=$uDB->getFullName($row[0]);

$html=$html.'    <tr>
        <td>'.$counter++.'</td>
        <td>'.$row[1].'</td>
        <td>'.$appliciant_name.'</td>
        <td>'.$row[2].'</td>
        <td>';
            $uid=$row[0];
            $app_detail=$lDB->getLeaveHistoryByStatus($row[0]); //Here $row[0] states student_id...
            if($app_detail){
                while($appInfo=  mysql_fetch_row($app_detail)){
$html=$html.'                <table border="1">
                    <tr>
                        <td>From:&nbsp;&nbsp;'.$appInfo[3].'&nbsp;&nbsp;To:&nbsp;&nbsp;'.$appInfo[4].'&nbsp;&nbsp;'; 
                            if($appInfo[6]==1 || $appInfo[6]==3){
                                $html=$html. "Canceled";
                            }elseif($appInfo[6]==4){
                                $html=$html. "Approved";
                            }
                        
$html=$html.'                        </td>
                    </tr>
                </table>';
                 }                
            }else{ 
$html=$html.'            <div style="text-align:center;">Nil</div>   ';
        }

$html=$html.'        </td>
        <td>
            <table border="1">
                <tr>';
         
             $leave_type=$lDB->getLeaveType();
                while($row1=  mysql_fetch_row($leave_type)) {
                    $max_leave=$row1[3];
                    $app_history=$lDB->getLeaveTypeHistory($uid,$row1[0]);//here $row[0] is leave_id
                    $used_leave=0;
                    $balanced_leave = 0;
                    while($row2=mysql_fetch_row($app_history)){
                        $startdate = $row2[1];
                        $enddate = $row2[2];
                        $timestamp_start = strtotime($startdate);
                        $timestamp_end = strtotime($enddate);
                        $difference = abs($timestamp_end - $timestamp_start);
                        $days = floor($difference/(60*60*24));
                        $used_leave = $used_leave + $days;           
                    }
                    
$html=$html.'                    <td  style="width:8.3pc; text-align: center;">';
                     if($used_leave==0){
                              $html=$html."...";                                    
                            }else{
                                $html=$html."$used_leave";
                            }
                        
$html=$html.'                            </td>';
              }
        
$html=$html.'                </tr>
            </table>
        </td>
    </tr>';
        
        
    }    
    
$html=$html.'</table>';

   
?>
<input type="button" name="html2pdf" id="html2pdf" Value="Generate Report" onClick="window.print()" />
