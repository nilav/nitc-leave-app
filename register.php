<!--
    
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<?php 
    $error=0;
    if(isset($_GET['error'])){
        $error=$_GET['error'];
    }
    
    
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
        
        <script type="text/javascript" src="static/js/jquery.js"></script>
        <script type="text/javascript" src="static/js/register.js"></script>
    </head>
    <body>
        <div id="registration_form">
            <?php 
                switch($error){
                    case 1:
                        echo "<div class='form-error' style='display: block;'>";
                        echo "Please enter valid email address.";
                        echo "</div>";
                        break;
                    
                    case 2:
                        echo "<div class='form-error' style='display: block;'>";
                        echo "User already exist . <a href='forgot.php'>Forgot Password ?</a>";
                        echo "</div>";
                        break;
                    
                    case 3:
                        echo "<div class='form-error' style='display: block;'>";
                        echo "Password should be atleast 6 chars.";
                        echo "</div>";
                        break;
                    
                    case 4:
                        echo "<div class='form-error' style='display: block;'>";
                        echo "Passwords are not matching.";
                        echo "</div>";
                        break;
                    case 5:
                        echo "<div class='form-error' style='display: block;'>";
                        echo "Please select user type.";
                        echo "</div>";
                        break;
                    
                    case 6:
                        echo "<div class='form-error' style='display: block;'>";
                        echo "Please enter valid Contact Number.";
                        echo "</div>";
                                        
                    default:
                        break;
                }
            
            ?>
            <form name="register" method="post" action="registerUser.php">
                <div class="textbox">
                    <span class="text">First Name</span>
                    <input type="text" name="first_name" placeholder="First Name" />
                </div>
                
                <div class="textbox">
                    <span class="text">Last Name</span>
                    <input type="text" name="last_name" placeholder="Last Name" />
                </div>
                
<!--                <div class="textbox">
                    <span class="text">Desired User Name</span>
                    <input type="text" name="user_name" placeholder="Desired User Name" />
                </div>-->
                
                <div class="textbox">
                    <span class="text">Email</span>
                    <input type="text" name="email" placeholder="Email" />
                </div>
                
                <div class="password">
                    <span class="text">Password</span>
                    <input type="password" name="pass1" placeholder="Password" />
                </div>
                
                <div class="password">
                    <span class="text">Confirm Password</span>
                    <input type="password" name="pass2" placeholder="Confirm Password" />
                </div>
                
                <div class="textbox">
                    <span class="text">Contact No.</span>
                    <input type="text" name="contact" placeholder="Contact Number" />
                </div>
                
                <div class="checkbox">
                    <span class="text">Gender</span>
                    <input type="radio" name="sex" value="M" checked="true" > Male</input>
                    <input type="radio" name="sex" value="F" > Female</input>
                </div>
                
                <div class="selectbox">
                    <span class="text">Category</span>
                    <select name="user_type" id="usertype_list">
                        <option value="0">--Select--</option>
                        <option value="5">Student</option>
                        <option value="2">Head of Department</option>
                        <option value="3">Faculty Advisor</option>
                        <option value="4">Office Staff</option>                        
                    </select>
                </div>
                
                <div class="selectbox department_info">
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
                
                <div class="textbox student_info" >
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
