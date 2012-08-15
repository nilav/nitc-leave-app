<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    require_once 'DB/initDB.php';
    require_once 'DB/registerDB.php';
    $rDB= new registerDB();
    $departmentlist= $rDB->getDepartmentList();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register</title>
    </head>
    <body>
        <div id="registration_form">
            <form name="register" method="post" action="#">
                <div class="textbox">
                    <span class="text">First Name</span>
                    <input type="text" name="first_name" placeholder="First Name" />
                </div>
                
                <div class="textbox">
                    <span class="text">Last Name</span>
                    <input type="text" name="last_name" placeholder="Last Name" />
                </div>
                
                <div class="textbox">
                    <span class="text">Email</span>
                    <input type="text" name="Email" placeholder="Email" />
                </div>
                
                <div class="selectbox">
                    <span class="text">Category</span>
                    <select name="user_type" id="usertype_list">
                        <option value="5">Student</option>
                        <option value="2">Head of Department</option>
                        <option value="3">Faculty Advisor</option>
                        <option value="4">Office Staff</option>                        
                    </select>
                </div>
                
                <div class="selectbox">
                    <span class="text">Department</span>
                    <select name="department" id="department_list">
                        <?php while($row=  mysql_fetch_row($departmentlist))
                        {
                         ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[1]; ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
                
                <div class="textbox student_info">
                    <span class="text">Roll No.</span>
                    <input type="text" name="roll_number" placeholder="Roll Number"/>
                </div>
                <div class="btn_1">
                    <input type="submit" Value="Submit" />
                </div>
                    
            </form>
        </div><!--end registration_form-->
    </body>
</html>
