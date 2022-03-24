<?php 
    session_start();
    include '../../lib/dfunc.php';
    $base_url = 'http://localhost/cmet/';
    
    $usernameError = "";
    $passwordError = "";
    $message = "";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)){
            //username will be unique
            $cmdtext = "SELECT * FROM `user` WHERE username = '$username'";
            $result = executeQuery($cmdtext);
            
            if(mysqli_num_rows($result) > 0)
            {
                $ret = mysqli_fetch_array($result);
                //Verify password
                $ver = verifyPassword($password, $ret['password']);
                if($ver){
                    //Set session
                    $_SESSION['ssUser'] = $ret;
                    //Redirect to main page
                    redirect($base_url.'user');

                }
                else{
                    $message = 'Invalid Username or Password';
                }
            }
            else
            {
                $message = 'Invalid Username or Password';
            }
        }
        else{
            if(empty($username)){
                $usernameError = "Username is required";
            }
            if(empty($password)){
                $passwordError = "Password is required";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/register.css">
        <link rel="stylesheet" href="../../css/login.css">
    </head>
    <body>
        <div class="register">
            <div class="register_bg">
                <h2>CMet.</h2>
            </div>
            <div class="form">
                <h3>Register</h3>
                <p>Welcome back,</p>
                <div class="register_form">
                    <form method="post">
                        <?php if($message != ''): ?>
                            <div class="alert alert-danger" role="alert"><?php echo $message ?></div>
                        <?php endif; ?>
                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="username">Username</label>
                                <input type="text" name="username" />
                                <?php if($usernameError != ''): ?>
                                    <label class="error"><?php echo $usernameError ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="password">Password</label>
                                <input type="password" name="password" />
                                <?php if($passwordError != ''): ?>
                                    <label class="error"><?php echo $passwordError ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" name="login">Login</button>
                        <h5>Not registered yet? <a href="./register.php">Register</a></h5>
                    </form>
                </div>
            </div>
        </div>
        <script src="../../js/bootstrap.js"></script>
    </body>
</html>