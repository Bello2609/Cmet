<?php 
    include '../../lib/dfunc.php';
    $base_url = 'http://localhost/cmet/';
    $message = '';
    if(isset($_POST['register'])){

        //Check if username exists
        $check = usernameExists($_POST['username']);

        if($check){
            //If username really exists, return
            $message = "Username is already being used";
            echo $message;
        }
        else{
            //Remove field submit
            if($_POST['conpassword'] != $_POST['password']){
                $message = "Passwords do not match";
            }
            else{
                // Hash passsword before insert
                $_POST['password'] = hashPassword($_POST['password']);

                unset($_POST['register']);
                unset($_POST['conpassword']);
                $cmdtext = sprintf(
                    "INSERT INTO %s (%s) values ('%s')",
                    "user",
                    implode(", ", array_keys($_POST)),
                    implode("', '", array_values($_POST))
                );

                $result = executeQuery($cmdtext);
                
                if($result)
                {
                    $message = 'Registration successful';
                    //redirect to login
                    redirect($base_url.'user/auth/login.php');
                }
                else
                {
                    $message = 'Registration not successful';
                }
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
        <title>Register Now</title>
        <link rel="stylesheet" href="../../css/register.css">
        <link rel="stylesheet" href="../../css/bootstrap.css">
    </head>
    <body>
        <div class="register">
            <div class="register_bg">
                <h2>CMet.</h2>
            </div>
            <div class="form">
                <h3>Register</h3>
                <p>We just need a few quick details to continue</p>
                <div class="register_form">
                    <form method="post">
                        <?php if($message != ''): ?>
                            <div class="alert alert-danger" role="alert"><?php echo $message ?></div>
                        <?php endif; ?>
                        <div class="form_container">
                            <label for="username">Username</label><br />
                            <input type="text" name="username" id="" autocomplete="off"/>
                        </div>

                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="title">Title</label>
                                <select name="title" id="">
                                    <option value="mr">Mr</option>
                                    <option value="miss">Miss</option>
                                    <option value="mrs">Mrs</option>
                                </select>
                            </div>
                            <div class="form_container-element">
                                <label for="profile_url">Profile Url</label>
                                <input type="text" name="profile_url" required />
                            </div>
                        </div>

                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" required />
                            </div>
                            <div class="form_container-element">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" required />
                            </div>
                        </div>

                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="password">Password</label>
                                <input type="password" max="6" min="3" name="password" required />
                            </div>
                            <div class="form_container-element">
                                <label for="conpassword">Confirm Password</label>
                                <input type="password" max="6" min="3" name="conpassword" required/>
                            </div>
                        </div>
                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" required/>
                            </div>
                            <div class="form_container-element">
                                <label for="gender">Gender</label>
                                <select name="gender" id="" required>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="address1">Address</label>
                                <input type="text" name="address1" required/>
                            </div>
                            <div class="form_container-element">
                                <label for="address2">Address 2(Optional)</label>
                                <input type="text" name="address2" required/>
                            </div>
                        </div>
                        <div class="form_container">
                            <div class="form_container-element">
                                <label for="telephone">Phone Number</label>
                                <input type="tel" name="telephone" required/>
                            </div>
                            <div class="form_container-element">
                                <label for="postcode">Postal code</label>
                                <input type="text" name="postcode" required/>
                            </div>
                        </div>
                        <div class="form_container-textarea">
                            <p>Tell us about yourself</p>
                            <textarea name="description" cols="50" rows="5" required></textarea>
                        </div>
                        <p>By clicking continue, you agree to CMet.'s <b>User Agreement</b>,</p>
                        <p>and <b>Privacy policy</b></p>
                        <button type="submit" name="register">Get Started</button>
                        <h5>Already a member? <a href="./login.php">Log in</a></h5>
                    </form>
                </div>
            </div>
        </div>
        <script src="../../js/main.js"></script>
    </body>
</html>