<?php
  //  include 'redirect.php';
    $username="";
    $userpassword="";
    $error=0;
//    if(isset($_POST["username"])){
//        $username=$_POST["username"];
//    }
    include 'includes/verify.php';
?>

<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="login_form">
            <h1>Login U Child</h1>
            <form action="" method="post" id="loginform">
                <div id="user_name">
                    <label>Name</label>
                    <input type="text" name="username" value="<?php echo $username;?>" placeholder="User Name" id="username" required="true" maxlength="45" />
                </div>
                <div id="password_text_box"><label>Password</label>
                    <input type="password" name="userpassword" value="<?php echo $userpassword;?>" placeholder="your Password" id='userpassword'required="true" />
                </div>
                <div id="submit">
                    <input type="submit" value="Submit" title="submit" class="btn_1" />
                </div>
                <div id="error">
                    <h3>
                        <?php 
                            if($error==1){
                                echo "User name or password is not entered";
                            }
                            if($error==2){
                                echo "Wrong User name or Password";
                            }
                        ?>
                    </h3>
                </div>
            </form>
        </div>
    </body>
</html>
