<?php
    include 'redirect.php';
    $email="";
    $userpassword="";
    $error=0;
//    if(isset($_POST["email"])){
//        $email=$_POST["email"];
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
            <span class="heading">Login</span>
            <form action="" method="post" id="loginform">
                <div id="user_name">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $email;?>" placeholder="Email" id="email" required="true" maxlength="45" />
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
                                echo "<br/>Forget your password <a href='forgot.php'>Click here</a> to recover it";
                            }
                        ?>
                    </h3>
                </div>
            </form>
        </div>
    </body>
</html>
